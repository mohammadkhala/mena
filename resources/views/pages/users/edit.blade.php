<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = __('editUsers'); //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
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
                        {{ __('editUsers') }}
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("users/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="username">{{ __('username') }} <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-username-holder" class=" ">
                                            <input id="ctrl-username" data-field="username"  value="<?php  echo $data['username']; ?>" type="text" placeholder="{{ __('enterUsername') }}"  required="" name="username"  data-url="componentsdata/users_username_value_exist/" data-loading-msg="{{ __('checkingAvailability') }}" data-available-msg="{{ __('available') }}" data-unavailable-msg="{{ __('notAvailable') }}" class="form-control  ctrl-check-duplicate" />
                                            <div class="check-status"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="image">{{ __('image') }} </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-image-holder" class=" ">
                                            <div class="dropzone " input="#ctrl-image" fieldname="image" uploadurl="{{ url('fileuploader/upload/image') }}"    data-multiple="false" dropmsg="{{ __('chooseFilesOrDropFilesHere') }}"    btntext="{{ __('browse') }}" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                <input name="image" id="ctrl-image" data-field="image" class="dropzone-input form-control" value="<?php  echo $data['image']; ?>" type="text"  />
                                                <!--<div class="invalid-feedback animated bounceIn text-center">{{ __('pleaseAChooseFile') }}</div>-->
                                                <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                            </div>
                                        </div>
                                        <?php Html :: uploaded_files_list($data['image'], '#ctrl-image'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="phone">{{ __('phone') }} </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-phone-holder" class=" ">
                                            <input id="ctrl-phone" data-field="phone"  value="<?php  echo $data['phone']; ?>" type="text" placeholder="{{ __('enterPhone') }}"  name="phone"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            {{ __('update') }}
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
    <!--pageautofill-->
$(document).ready(function(){
	// custom javascript | jquery codes
});

</script>
@endsection
