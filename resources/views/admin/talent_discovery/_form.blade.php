<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group row m-b-15">
            <strong>Title</strong>
            {!! Form::text('title', null, array('placeholder' => 'title','class' => 'form-control','id'=>'title')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description One :</strong>
            <textarea id="description_one" name="description_one"
                class="form-control ckeditor">{{ old('description_one', isset($model) ? $model->description_one : '') }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image One<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_one))
            <input type="file" name="image_one" class="dropify" id="image_one"
                data-default-file="{{ $model->image_one ? url('uploads/talent_discovery/'.$model->image_one):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_one" class="dropify" id="image_one"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image Two<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_two))
            <input type="file" name="image_two" class="dropify" id="image_two"
                data-default-file="{{ $model->image_two ? url('uploads/talent_discovery/'.$model->image_two):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_two" class="dropify" id="image_two"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description Two :</strong>
            <textarea id="description_two" name="description_two"
                class="form-control ckeditor">{{ old('description_two', isset($model) ? $model->description_two : '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description Three :</strong>
            <textarea id="description_three" name="description_three"
                class="form-control ckeditor">{{ old('description_three', isset($model) ? $model->description_three : '') }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image Three<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_three))
            <input type="file" name="image_three" class="dropify" id="image_three"
                data-default-file="{{ $model->image_three ? url('uploads/talent_discovery/'.$model->image_three):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_three" class="dropify" id="image_three"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image Four<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_four))
            <input type="file" name="image_four" class="dropify" id="image_four"
                data-default-file="{{ $model->image_four ? url('uploads/talent_discovery/'.$model->image_four):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_four" class="dropify" id="image_four"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description four :</strong>
            <textarea id="description_four" name="description_four"
                class="form-control ckeditor">{{ old('description_four', isset($model) ? $model->description_four : '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description Five :</strong>
            <textarea id="description_five" name="description_five"
                class="form-control ckeditor">{{ old('description_five', isset($model) ? $model->description_five : '') }}</textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image Five<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_five))
            <input type="file" name="image_five" class="dropify" id="image_five"
                data-default-file="{{ $model->image_five ? url('uploads/talent_discovery/'.$model->image_five):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_five" class="dropify" id="image_five"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group m-b-15">
            <strong>Image Six<span class="text-danger">*</span>:</strong>
            @if(!empty($model->image_six))
            <input type="file" name="image_six" class="dropify" id="image_six"
                data-default-file="{{ $model->image_six ? url('uploads/talent_discovery/'.$model->image_six):'' }}"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @else
            <input type="file" name="image_six" class="dropify" id="image_six"
                accept="image/*;capture=camera,.png,.jpg,.jpeg,.svg" data-allowed-file-extensions="jpg jpeg png svg" />
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description Six :</strong>
            <textarea id="description_six" name="description_six"
                class="form-control ckeditor">{{ old('description_six', isset($model) ? $model->description_six : '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description :</strong>
            <textarea id="description" name="description"
                class="form-control ckeditor">{{ old('description', isset($model) ? $model->description : '') }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb pull-right">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('talent-discovery.edit') }}">Back to Listing</a>
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>
    </div>
</div>