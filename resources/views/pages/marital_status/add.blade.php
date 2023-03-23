<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = __('addNewMaritalStatus'); //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
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
                        {{ __('addNewMaritalStatus') }}
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
                <div class="col-md-9 comp-grid " >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="marital_status-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('marital_status.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="diagnosis">{{ __('diagnosis') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-diagnosis-holder" class=" ">
                                                <textarea placeholder="{{ __('enterDiagnosis') }}" id="ctrl-diagnosis" data-field="diagnosis"  rows="5" name="diagnosis" class=" form-control"><?php echo get_value('diagnosis') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">{{ __('pleaseEnterText') }}</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="solution">{{ __('solution') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-solution-holder" class=" ">
                                                <textarea placeholder="{{ __('enterSolution') }}" id="ctrl-solution" data-field="solution"  rows="5" name="solution" class=" form-control"><?php echo get_value('solution') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">{{ __('pleaseEnterText') }}</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="cost">{{ __('cost') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cost-holder" class=" ">
                                                <input id="ctrl-cost" data-field="cost"  value="<?php echo get_value('cost', "NULL") ?>" type="text" placeholder="{{ __('enterCost') }}"  name="cost"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="children_id">{{ __('childrenId') }} </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-children_id-holder" class=" ">
                                                <input id="ctrl-children_id" data-field="children_id"  value="<?php echo get_value('children_id', "NULL") ?>" type="number" placeholder="{{ __('enterChildrenId') }}" step="any"  name="children_id"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                {{ __('submit') }}
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
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
    
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
