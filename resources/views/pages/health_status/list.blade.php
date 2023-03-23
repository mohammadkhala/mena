<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = __('healthStatus'); //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col col-md-auto  " >
                    <div class=" h5 font-weight-bold text-primary" >
                        {{ __('healthStatus') }}
                    </div>
                </div>
                <div class="col-md-auto  " >
                    <a  class="btn btn-primary" href="<?php print_link("health_status/add", true) ?>" >
                    <i class="material-icons">add</i>                               
                    {{ __('addNewHealthStatus') }} 
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="{{ __('search') }}" />
                        <button class="btn btn-primary"><i class="material-icons">search</i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 comp-grid " >
                <?php Html::display_page_errors($errors); ?>
                <div  class=" page-content" >
                    <div id="health_status-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <?php Html::page_bread_crumb("/health_status/", $field_name, $field_value); ?>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <th class="td-id" > {{ __('id') }}</th>
                                        <th class="td-diagnosis" > {{ __('diagnosis') }}</th>
                                        <th class="td-solution" > {{ __('solution') }}</th>
                                        <th class="td-cost" > {{ __('cost') }}</th>
                                        <th class="td-children_id" > {{ __('childrenId') }}</th>
                                        <th class="td-id" > {{ __('childrenId') }}</th>
                                        <th class="td-btn"></th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        $sum_of_cost = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                        $sum_of_cost = $sum_of_cost + $data['cost'];
                                    ?>
                                    <tr>
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <a href="<?php print_link("health_status/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-diagnosis">
                                            <span  data-source='<?php print_link('componentsdata/name_option_list'); ?>' 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("health_status/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="diagnosis" 
                                            data-title="Enter Diagnosis" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="textarea" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['diagnosis'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-solution">
                                            <span  data-source='<?php print_link('componentsdata/name_option_list'); ?>' 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("health_status/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="solution" 
                                            data-title="Enter Solution" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="textarea" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['solution'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-cost">
                                            <span  data-step="0.1" 
                                            data-source='<?php print_link('componentsdata/name_option_list'); ?>' 
                                            data-value="<?php echo $data['cost']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("health_status/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="cost" 
                                            data-title="Enter Cost" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="number" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['cost'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-children_id">
                                            <span  data-step="any" 
                                            data-source='<?php print_link('componentsdata/name_option_list'); ?>' 
                                            data-value="<?php echo $data['children_id']; ?>" 
                                            data-pk="<?php echo $data['id'] ?>" 
                                            data-url="<?php print_link("health_status/edit/" . urlencode($data['id'])); ?>" 
                                            data-name="children_id" 
                                            data-title="Enter Children Id" 
                                            data-placement="left" 
                                            data-toggle="click" 
                                            data-type="number" 
                                            data-mode="popover" 
                                            data-showbuttons="left" 
                                            class="is-editable" >
                                            <?php echo  $data['children_id'] ; ?>
                                            </span>
                                        </td>
                                        <td class="td-children_id">
                                            <?php echo  $data['children_id'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <a class="btn btn-sm btn-primary has-tooltip "    href="<?php print_link("health_status/view/$rec_id"); ?>" >
                                            <i class="material-icons">visibility</i> {{ __('view') }}
                                        </a>
                                        <a class="btn btn-sm btn-success has-tooltip "    href="<?php print_link("health_status/edit/$rec_id"); ?>" >
                                        <i class="material-icons">edit</i> {{ __('edit') }}
                                    </a>
                                    <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="{{ __('promptDeleteRecord') }}" data-display-style="modal"  href="<?php print_link("health_status/delete/$rec_id"); ?>" >
                                    <i class="material-icons">delete_sweep</i> {{ __('delete') }}
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                        <!--endrecord-->
                    </tbody>
                    <tbody class="search-data"></tbody>
                    <tfoot><tr><th></th><th></th><th></th><th>Total Cost = <?php echo $sum_of_cost;  ?></th><th></th><th></th><th></th></tr></tfoot>
                    <?php
                        }
                        else{
                    ?>
                    <tbody class="page-data">
                        <tr>
                            <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                <i class="material-icons">block</i> {{ __('noRecordFound') }}
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <?php
                if($show_footer){
            ?>
            <div class=" mt-3">
                <div class="row align-items-center justify-content-between">    
                    <div class="col-md-auto justify-content-center">    
                        <div class="d-flex justify-content-start">  
                            <button data-prompt-msg="{{ __('promptDeleteRecords') }}" data-display-style="modal" data-url="<?php print_link("health_status/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                            <i class="material-icons">delete_sweep</i> {{ __('deleteSelected') }}
                            </button>
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">save</i> 
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = add_query_params(['export' => 'print']); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                    <img src="{{ asset('images/print.png') }}" class="mr-2" /> PRINT
                                </a>
                                <?php $export_pdf_link = add_query_params(['export' => 'pdf']); ?>
                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                <img src="{{ asset('images/pdf.png') }}" class="mr-2" /> PDF
                            </a>
                            <?php $export_csv_link = add_query_params(['export' => 'csv']); ?>
                            <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                            <img src="{{ asset('/images/csv.png') }}" class="mr-2" /> CSV
                        </a>
                        <?php $export_excel_link = add_query_params(['export' => 'excel']); ?>
                        <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                        <img src="{{ asset('images/xsl.png') }}" class="mr-2" /> EXCEL
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col">   
        <?php
            if($show_pagination == true){
            $pager = new Pagination($total_records, $record_count);
            $pager->show_page_count = false;
            $pager->show_record_count = true;
            $pager->show_page_limit =false;
            $pager->limit = $limit;
            $pager->show_page_number_list = true;
            $pager->pager_link_range=5;
            $pager->render();
            }
        ?>
    </div>
</div>
</div>
<?php
    }
?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
<!-- Page custom css -->
@section('pagecss')
<style>

</style>
@endsection
<!-- Page custom js -->
@section('pagejs')
<script>
    <!--pageautofill-->
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
