<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = __('medicalStatusDetails'); //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="material-icons">arrow_back</i>                                
                         
                    </a>
                </div>
                <div class="col col-md-auto  " >
                    <div class=" h5 font-weight-bold text-primary" >
                        {{ __('medicalStatusDetails') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid " >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <?php
                            $counter = 0;
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                            $counter++;
                        ?>
                        <div id="page-main-content" class=" px-3 mb-3">
                            <!-- Table Body Start -->
                            <div class="page-data">
                                <!--PageComponentStart-->
                                <div class="mb-3 row gutter-lg">
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('id') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('diagnosis') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['diagnosis'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('solution') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['solution'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('cost') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['cost'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenId') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenId') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenName') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_name'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenDateOfBirth') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_date_of_birth'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenAddress') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_address'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenGender') }}</small>
                                                    <div class="fw-bold">
                                                        <?php echo  $data['children_gender'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-12 col-md-4">
                                        <div class="bg-light mb-3 card-1 p-2 border rounded">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <small class="text-muted">{{ __('childrenImage') }}</small>
                                                    <div class="fw-bold">
                                                        <?php 
                                                            Html :: page_img($data['children_image'], 'auto', 'auto', "", 1); 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PageComponentEnd-->
                                <div class="d-flex gap-1 justify-content-start">
                                    <a class="btn btn-sm btn-success has-tooltip "   title="{{ __('edit') }}" href="<?php print_link("medical_status/edit/$rec_id"); ?>" >
                                    <i class="material-icons">edit</i> {{ __('edit') }}
                                </a>
                                <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" data-prompt-msg="{{ __('promptDeleteRecord') }}" data-display-style="modal" title="{{ __('delete') }}" href="<?php print_link("medical_status/delete/$rec_id?redirect=medical_status"); ?>" >
                                <i class="material-icons">delete_sweep</i> {{ __('delete') }}
                            </a>
                        </div>
                    </div>
                    <!-- Table Body End -->
                </div>
                <?php
                    }
                    else{
                ?>
                <!-- Empty Record Message -->
                <div class="text-muted p-3">
                    <i class="material-icons">block</i> {{ __('noRecordFound') }}
                </div>
                <?php
                    }
                ?>
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
