<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
?>
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("account/edit"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="username">{{ __('username') }} </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-username-holder" class=" ">
                                            <input id="ctrl-username" data-field="username"  value="<?php  echo $data['username']; ?>" type="text" placeholder="{{ __('enterUsername') }}"  name="username"  class="form-control " />
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
