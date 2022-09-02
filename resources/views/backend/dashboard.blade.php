@extends('backend.layout.app')
@section('title', 'Dashboard')
@push('custom_style')
    <style>
        .application-form {
            background: #acd9bb;
            padding: 30px;
        }

        .application-form .card-title {
            display: block;
            width: 100%;
            background: #075e54;
            padding: 5px;
            margin-bottom: 30px;
            text-align: center;
        }

        .application-form .card-title h2 {
            color: #fff;
            font-family: sans-serif;
            font-weight: bold;
        }

        .application-form input {
            background-color: #fbfbfb;
            box-shadow: 1px 1px 3px 0px #626262 inset;
        }

        .application-form .btn-submit {
            background: #075e54;
            border: 1px solid #0add5d;
            color: #fff;
            padding: 10px;
            font-size: 20px;
        }

        .application-form .btn-submit:hover {
            background: #bb4907;

        }

        ul.nav{
            width: 100%;
            margin-bottom: 30px;
        }

        ul.nav li a{
            color: #0d932b;
            font-weight: 800;
        }
    </style>
@endpush
@section('content')
    <section class="content">
        <div class="container-fluid">

            @role('admin')
            @endrole

            @role('employer|employee')
                <div class="application-form">
                    <div class="card-title">
                        <h2>নিবন্ধন ফর্ম</h2>
                    </div>
                    <div>
                        <form action="{{route('employee.apply')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-row">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item col-md-4">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> ব্যক্তিগত </a>
                                        </li>
                                        <li class="nav-item col-md-4">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> দক্ষতা </a>
                                        </li>
                                        <li class="nav-item col-md-4">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"> অন্যান্য </a>
                                        </li>
                                    </ul> 
                                </div>
                                <div>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="Name">নাম <span class="text-danger">*</span> </label>
                                                    <input type="text" name="name" class="form-control" id="Name" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="phone"> মোবাইল নং <span class="text-danger">*</span> </label>
                                                    <input type="text" name="phone" class="form-control" id="phone" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email">ইমেইল</label>
                                                    <input type="email" name="email" class="form-control" id="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="skill"> দক্ষতা </label>
                                                    <input type="text" name="skill" class="form-control" id="skill">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="profession"> পেশা </label>
                                                    <input type="text" name="profession" class="form-control" id="profession">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="education"> শিক্ষাগত যোগ্যতা </label>
                                                    <select id="education" name="education" class="form-control">
                                                        <option value="Masters or equivalent or more" selected>মাস্টার্স বা সমমান বা তার উপরে </option>
                                                        <option value="Honors or equivalent"> অনার্স বা সমমান </option>
                                                        <option value="HSC or equivalent"> উচ্চমাধ্যমিক বা সমমান </option>
                                                        <option value="SSC or equivalent">মাধ্যমিক বা সমমান </option>
                                                        <option value="under SSC"> মাধ্যমিকের নিচে</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="birth_date"> জন্মতারিখ </label>
                                                    <input class="datepicker form-control" name="birth_date" data-date-format="dd/mm/yyyy"
                                                        placeholder="dd/mm/yyyy">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="gender"> লিঙ্গ </label>
                                                    <select id="gender" name="gender" class="form-control">
                                                        <option value="Male" selected> পুরুষ </option>
                                                        <option value="Female"> নারী </option>
                                                        <option value="Other"> অন্যান্য </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="religion"> ধর্ম </label>
                                                    <select id="religion" name="religion" class="form-control">
                                                        <option value="Islam" selected> ইসলাম </option>
                                                        <option value="Hindu"> হিন্দু </option>
                                                        <option value="Cristian"> খ্রিষ্টান </option>
                                                        <option value="Buddhism"> বৌদ্ধ </option>
                                                        <option value="Other"> অন্যান্য </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="nationality"> জাতীয়তা </label>
                                                    <input type="text" name="nationality" class="form-control" id="nationality">
                                                </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="photo">পিকচার</label>
                                                        <input type="file" name="photo" class="form-control-file" id="photo">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-submit btn-block">সাবমিট করুন</button>
                        </form>
                    </div>
            @endrole

        </div>
    </section>
@endsection
