@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Forms</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Form-wizards</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                         data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Basic Content Wizard
                    </div>
                    <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                    {!! Form::open(['route' => 'store_employees', 'method' => 'post', 'files' => true]) !!}
                    <div id="wizard1">
                        <h3>البيانات الاساسية</h3>
                        <section>
                            <div class="control-group form-group">
                                {!! Form::label('name', 'الاسم') !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('job_number', 'الرقم الوظيفي') !!}
                                {!! Form::text('job_number', old('job_number'), ['class' => 'form-control']) !!}
                                @error('job_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('major', 'التخصص') !!}
                                {!! Form::text('major', old('major'), ['class' => 'form-control']) !!}
                                @error('major')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('gender_id', 'الجنس') !!}
                                {!! Form::select('gender_id', ['' => '---'] + $genders->toArray(), old('gender_id'), ['class' => 'form-control']) !!}
                                @error('gender_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('status_id', 'الحالة الاجتماعية') !!}
                                {!! Form::select('status_id', ['' => '---'] + $statuses->toArray(), old('status_id'), ['class' => 'form-control']) !!}
                                @error('status_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('mobile', 'الهاتف') !!}
                                {!! Form::text('mobile', old('mobile'), ['class' => 'form-control']) !!}
                                @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('email', 'الايميل') !!}
                                {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('hire_date', 'تاريخ التوظيف') !!}
                                {!! Form::date('hire_date', old('hire_date'), ['class' => 'form-control']) !!}
                                @error('hire_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('birthdate', 'تاريخ الميلاد') !!}
                                {!! Form::date('birthdate', old('birthdate'), ['class' => 'form-control']) !!}
                                @error('birthdate')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('address', 'العنوان') !!}
                                {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                                @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                <label for="">اختر صورة</label>
                                <input type="file" name="photo">
                                @error('photo')
                                <span class="text-danger">{{ $message }}
                                    </span>@enderror

                            </div>
                        </section>
                        <h3>الشهادات الجامعية</h3>
                        <section>
                            <div class="control-group form-group">
                                {!! Form::label('qualification', 'المؤهل العلمي') !!}
                                {!! Form::text('qualification', old('qualification'), ['class' => 'form-control']) !!}
                                @error('qualification')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('major', 'التخصص') !!}
                                {!! Form::text('major', old('major'), ['class' => 'form-control']) !!}
                                @error('major')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('university_name', 'الجامعة') !!}
                                {!! Form::text('university_name', old('university_name'), ['class' => 'form-control']) !!}
                                @error('university_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('specialization_history', 'تاريخ التخصص') !!}
                                {!! Form::date('specialization_history', old('specialization_history'), ['class' => 'form-control']) !!}
                                @error('specialization_history')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </section>
                        <h3>الدورات</h3>
                        <section>
                            <div class="control-group form-group">
                                {!! Form::label('course_name', 'اسم الدورة') !!}
                                {!! Form::text('course_name', old('course_name'), ['class' => 'form-control']) !!}
                                @error('course_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('place', 'المكان') !!}
                                {!! Form::text('place', old('place'), ['class' => 'form-control']) !!}
                                @error('place')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('start_date', 'تاريخ البداية') !!}
                                {!! Form::date('start_date', old('start_date'), ['class' => 'form-control']) !!}
                                @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('end_date', 'تاريخ الانتهاء') !!}
                                {!! Form::date('end_date', old('end_date'), ['class' => 'form-control']) !!}
                                @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'تفاصيل') !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control summernote']) !!}
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </section>
                        <h3>الخبرات</h3>
                        <section>
                            <div class="control-group form-group">
                                {!! Form::label('work_place', 'مكان العمل') !!}
                                {!! Form::text('work_place', old('work_place'), ['class' => 'form-control']) !!}
                                @error('work_place')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('job_title', 'المسمى الوظيفي') !!}
                                {!! Form::text('job_title', old('job_title'), ['class' => 'form-control']) !!}
                                @error('job_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('start_date', 'تاريخ البداية') !!}
                                {!! Form::date('start_date', old('start_date'), ['class' => 'form-control']) !!}
                                @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('end_date', 'تاريخ الانتهاء') !!}
                                {!! Form::date('end_date', old('end_date'), ['class' => 'form-control']) !!}
                                @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('salary', 'الراتب') !!}
                                {!! Form::number('salary', old('salary'), ['class' => 'form-control summernote']) !!}
                                @error('salary')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'تفاصيل') !!}
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control summernote']) !!}
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </section>
                        <h3>البيانات العائلية</h3>
                        <section>
                            <div class="control-group form-group">
                                {!! Form::label('family_name', 'الاسم') !!}
                                {!! Form::text('family_name', old('family_name'), ['class' => 'form-control']) !!}
                                @error('family_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('id_number', 'رقم الهوية') !!}
                                {!! Form::number('id_number', old('id_number'), ['class' => 'form-control']) !!}
                                @error('id_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('relative_relation', 'صلة القرابة') !!}
                                {!! Form::text('relative_relation', old('relative_relation'), ['class' => 'form-control']) !!}
                                @error('major')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group">
                                {!! Form::label('status_id', 'الحالة الاجتماعية') !!}
                                {!! Form::select('status_id', ['' => '---'] + $statuses->toArray(), old('status_id'), ['class' => 'form-control']) !!}
                                @error('status_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="control-group form-group mb-0">
                                {!! Form::label('birthdate', 'تاريخ الميلاد') !!}
                                {!! Form::date('birthdate', old('birthdate'), ['class' => 'form-control']) !!}
                                @error('birthdate')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-4">
                                {!! Form::label('is_study', 'is_study') !!}
                                {!! Form::select('is_study', ['1' => 'Yes', '0' => 'No'], old('is_study'), ['class' => 'form-control']) !!}
                                @error('is_study')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-4">
                                {!! Form::label('is_work', 'is_work') !!}
                                {!! Form::select('is_work', ['1' => 'Yes', '0' => 'No'], old('is_work'), ['class' => 'form-control']) !!}
                                @error('is_work')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

{{--                            <div class="control-group form-group mb-0">--}}
{{--                                <label for="">اختر صورة</label>--}}
{{--                                <input type="file" name="photo_id">--}}
{{--                                @error('photo_id')--}}
{{--                                <span class="text-danger">{{ $message }}--}}
{{--                                    </span>@enderror--}}
{{--                            </div>--}}
                        </section>
                    </div>
                    <div class="form-group pt-4">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <!-- /row -->


    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
@endsection
