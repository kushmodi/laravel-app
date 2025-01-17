@php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
@endphp
@extends('user.layout')

@if (!empty($abs->language) && $abs->language->rtl == 1)
    @section('styles')
        <style>
            form:not(.modal-form) input,
            form:not(.modal-form) textarea,
            form:not(.modal-form) select,
            select[name='language'] {
                direction: rtl;
            }

            form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }
        </style>
    @endsection
@endif


@section('content')
    <div class="page-header">
        <h4 class="page-title">Testimonials</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('user.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Website Pages</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Home Page</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Testimonials</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-title">Testimonials</div>
                        </div>
                        <div class="col-lg-2">
                             @if (!empty($userLangs))
                                <select name="language" class="form-control"
                                        onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($userLangs as $lang)
                                        <option
                                            value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline-block">Testimonial Side Content</h4>
                </div>
                <form class="" id="" action="{{ route('user.testimonialSideContent.update', $lang_id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            @if ($activeTheme == 'bakery' || $activeTheme == 'grocery')
                                <div class="col-lg-10 offset-lg-1">
                                    <label for="image"><strong>Side Image</strong></label>
                                    <div class="form-group">
                                        <div class="showImage mb-3">

                                            @if (!empty($abe->testimonial_side_img))
                                                <a class="remove-image" data-type="testimonial_side_img"><i
                                                        class="far fa-times-circle"></i></a>
                                            @endif
                                            <img src="{{ !empty($abe->testimonial_side_img) ? Uploader::getImageUrl(Constant::WEBSITE_IMAGE, $abe->testimonial_side_img, $userBs) : asset('assets/admin/img/noimage.jpg') }}"
                                                alt="..." class="img-thumbnail w-100">
                                        </div>
                                        <input type="file" name="testimonial_side_img" class="form-control image">
                                        @if ($errors->has('testimonial_side_img'))
                                            <p class="mb-0 text-danger">{{ $errors->first('testimonial_side_img') }}</p>
                                        @endif
                                        <p id="errtestimonial_side_img" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            @endif


                            <div class="col-lg-10 offset-lg-1">
                                <div class="form-group">
                                    <label>Title **</label>
                                    <input class="form-control" name="testimonial_section_title"
                                        value="{{ $abs->testimonial_title }}" placeholder="Enter Title">
                                    <p id="errtestimonial_section_title" class="mb-0 text-danger em"></p>
                                    @if ($errors->has('testimonial_section_title'))
                                        <p class="mb-0 em text-danger">{{ $errors->first('testimonial_section_title') }}</p>
                                    @endif
                                </div>
                            </div>
                            @if ($activeTheme == 'bakery' || $activeTheme == 'grocery' || $activeTheme == 'pizza')
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="form-group">
                                        <label>Text </label>
                                        <input class="form-control" name="testimonial_section_text"
                                            value="{{ $abs->testimonial_section_text }}" placeholder="Enter Text">
                                        <p id="errtestimonial_section_text" class="mb-0 text-danger em"></p>
                                        @if ($errors->has('testimonial_section_text'))
                                            <p class="mb-0 text-danger">{{ $errors->first('testimonial_section_text') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if ($activeTheme == 'pizza')
                                <!--- top Shape Image in Pizza Theme -->
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <label for="image"><strong>Top Shape Image</strong></label>
                                        </div>
                                        <div class="showImage mb-3">

                                            @if (!empty($abe->testimonial_section_top_shape_image))
                                                <a class="remove-image" data-type="testimonial_section_top_shape_image"><i
                                                        class="far fa-times-circle"></i></a>
                                            @endif
                                            <img src="{{ !empty($abe->testimonial_section_top_shape_image) ? Uploader::getImageUrl(Constant::WEBSITE_IMAGE, $abe->testimonial_section_top_shape_image, $userBs) : asset('assets/admin/img/noimage.jpg') }}"
                                                alt="..." class="img-thumbnail w-100">
                                        </div>
                                        <input type="file" name="testimonial_section_top_shape_image"
                                            class="form-control image">
                                        @if ($errors->has('testimonial_section_top_shape_image'))
                                            <p class="mb-0 text-danger">
                                                {{ $errors->first('testimonial_section_top_shape_image') }}</p>
                                        @endif
                                        <p id="errtestimonial_section_top_shape_image" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                                <!---bottom shape image in Pizza Theme -->
                                <div class="col-lg-10 offset-lg-1">
                                    <div class="form-group">
                                        <div class="mb-2">
                                            <label for="image"><strong>Bottom Shape Image</strong></label>
                                        </div>
                                        <div class="showImage mb-3">
                                            @if (!empty($abe->testimonial_section_bottom_shape_image))
                                                <a class="remove-image"
                                                    data-type="testimonial_section_bottom_shape_image"><i
                                                        class="far fa-times-circle"></i></a>
                                            @endif
                                            <img src="{{ !empty($abe->testimonial_section_bottom_shape_image) ? Uploader::getImageUrl(Constant::WEBSITE_IMAGE, $abe->testimonial_section_bottom_shape_image, $userBs) : asset('assets/admin/img/noimage.jpg') }}"
                                                alt="..." class="img-thumbnail w-100">
                                        </div>
                                        <input type="file" name="testimonial_section_bottom_shape_image"
                                            class="form-control image">
                                        @if ($errors->has('testimonial_section_bottom_shape_image'))
                                            <p class="mb-0 text-danger">
                                                {{ $errors->first('testimonial_section_bottom_shape_image') }}</p>
                                        @endif
                                        <p id="errtestimonial_section_bottom_shape_image" class="mb-0 text-danger em"></p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    {{-- <button type="submit" id="displayNotif" class="btn btn-success">Update</button> --}}
                                    <button type="submit" id="" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Testimonials</div>
                    <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                        data-target="#createModal"><i class="fas fa-plus"></i> Add Testimonial</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($testimonials) == 0)
                                <h3 class="text-center">NO TESTIMONIAL FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Rank</th>
                                                <th scope="col">Serial Number</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $key => $testimonial)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ Uploader::getImageUrl(Constant::WEBSITE_TESTIMONIAL_IMAGES, $testimonial->image, $userBs) }}"
                                                            alt="" width="40"></td>
                                                    <td>{{ convertUtf8($testimonial->name) }}</td>
                                                    <td>{{ convertUtf8($testimonial->rank) }}</td>
                                                    <td>{{ $testimonial->serial_number }}</td>
                                                    <td class="">
                                                        <a class="btn btn-secondary btn-sm "
                                                            href="{{ route('user.testimonial.edit', $testimonial->id) . '?language=' . request()->input('language') }}">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>

                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="{{ route('user.testimonial.delete') }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="testimonial_id"
                                                                value="{{ $testimonial->id }}">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm deletebtn mb-1">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>

                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Create Testimonial Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="ajaxForm" class="modal-form" action="{{ route('user.testimonial.store') }}"
                        method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="col-12 mb-2">
                                        <label for="image"><strong>Image ** </strong></label>
                                    </div>
                                    <div class="col-md-12 showImage mb-3">
                                        <img src="{{ asset('assets/admin/img/noimage.jpg') }}" alt="..."
                                            class="img-thumbnail">
                                    </div>
                                    <input type="file" name="image" id="image" class="form-control image">
                                    <p id="errimage" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <label for="">Language **</label>
                            <select name="user_language_id" class="form-control">
                                <option value="" selected disabled>Select a language</option>
                                @foreach ($userLangs as $lang)
                                    <option value="{{$lang->id}}">{{$lang->name}}</option>
                                @endforeach
                            </select>
                            <p id="erruser_language_id" class="mb-0 text-danger em"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Comment **</label>
                            <textarea class="form-control" name="comment" rows="3" cols="80" placeholder="Enter comment"></textarea>
                            <p id="errcomment" class="mb-0 text-danger em"></p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Name **</label>
                                    <input type="text" class="form-control" name="name" value=""
                                        placeholder="Enter name">
                                    <p id="errname" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Rank **</label>
                                    <input type="text" class="form-control" name="rank" value=""
                                        placeholder="Enter rank">
                                    <p id="errrank" class="mb-0 text-danger em"></p>
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Rating ** </label>
                                    <input type="text" class="form-control ltr" name="rating" value=""
                                        placeholder="Enter rating">
                                    <p id="errrating" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Serial Number **</label>
                                    <input type="number" class="form-control ltr" name="serial_number" value=""
                                        placeholder="Enter Serial Number">
                                    <p id="errserial_number" class="mb-0 text-danger em"></p>
                                    <p class="text-warning"><small>The higher the serial number is, the later the
                                            testimonial will
                                            be shown.</small></p>
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function($) {
            "use strict";

            $(".remove-image").on('click', function(e) {
                e.preventDefault();
                $(".request-loader").addClass("show");

                let type = $(this).data('type');
                let fd = new FormData();
                fd.append('type', type);
                fd.append('language_id', {{ $abe->language->id }});

                $.ajax({
                    url: "{{ route('user.testimonial.rmvimg') }}",
                    data: fd,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "success") {
                            window.location =

                                "{{ url()->current() . '?language=' . $abe->language->code }}";
                        }
                    }
                })
            });
        });
    </script>
@endsection
