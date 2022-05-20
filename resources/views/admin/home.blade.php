@extends('layouts.admin')
@section('title','الصفحة الرئيسية')
@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>المتدربات</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($students)
                      {{$students->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fas fa-user-graduate"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>المدربات</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($chefs)
                      {{$chefs->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>فيديوهات</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($videos)
                      {{$videos->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fa fa-play-circle"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>بودكاستات</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($podcasts)
                      {{$podcasts->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fa fa-microphone-alt"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>ملفات تربوية</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($materials)
                      {{$materials->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fa fa-folder-open"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>خدمات</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($services)
                      {{$services->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fas fa-people-carry"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="shadow-md rounded border-warning border p-3">
              <div class=""><strong>فرص عمل</strong></div>
              <div class="d-flex justify-content-between">
                <div class="count"><span class="display-3 text-dark">
                  @isset($jobs)
                    {{$jobs->count()}}
                    @else
                    0
                  @endisset
              </span></div>
                <div class=" h2 display-4 text-warning">
                  <i class="fas fa-user-tie"></i>
                </div>
              </div>
              <div class="small text-muted"> أشرطة فيديو تدريبية</div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="shadow-md rounded border-warning border p-3">
                <div class=""><strong>سطاج</strong></div>
                <div class="d-flex justify-content-between">
                  <div class="count"><span class="display-3 text-dark">
                    @isset($internships)
                      {{$internships->count()}}
                      @else
                      0
                    @endisset
                </span></div>
                  <div class=" h2 display-4 text-warning">
                    <i class="fas fa-handshake"></i>
                  </div>
                </div>
                <div class="small text-muted"> أشرطة فيديو تدريبية</div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">المتدربات</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>الإسم</th>
                        <th>الهاتف</th>
                        <th>تاريخ الميلاد</th>
                        <th>المستوى الدراسي</th>
                        <th>رقم هاتف الوصي</th>
                        <th>الوضع العائلي</th>
                        <th>عدد الاطفال</th>
                        <th>رقم البطاقة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                        <th>مزيد من التفاصيل</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($students)
                          @foreach ($students as $student)
                            <tr>
                              <td class="text-nowrap"><img src="{{ route("student-avatar",$student->avatar) }}" width="30" height="30" class="d-inline-block rounded-circle" alt=""> {{ $student->fname }} {{ $student->lname }}</td>
                              <td><a href="tel:{{ $student->phone }}" class="btn btn-sm btn-dark">{{ $student->phone }}</a></td>
                              <td>{{ $student->birthday }}</td>
                              <td class="text-nowrap">{{ $student->level }}</td>
                              <td><a href="tel:{{ $student->gardian_number}}" class="btn btn-sm btn-dark">{{ $student->gardian_number}}</a></td>
                              <td>{{ $student->family_situation }}</td>
                              <td>{{ $student->number_of_children }}</td>
                              <td>{{ $student->cin_number }}</td>
                              <td><span class="text-nowrap">{{ $student->adress }}</span></td>
                              <td><a href="mailto:{{ $student->email }}" class="btn btn-sm btn-info">{{ $student->email }}</a></td>
                              <td><small title="{{ $student->more_details }}" class="text-truncate d-block" title style="max-width: 150px;">{{ $student->more_details }}</small></td>
                              <td>
                                  <form action="{{ route("admin.students.delete",$student->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>الإسم</th>
                        <th>الهاتف</th>
                        <th>تاريخ الميلاد</th>
                        <th>المستوى الدراسي</th>
                        <th>رقم هاتف الوصي</th>
                        <th>الوضع العائلي</th>
                        <th>عدد الاطفال</th>
                        <th>رقم البطاقة</th>
                        <th>العنوان</th>
                        <th>البريد الإلكتروني</th>
                        <th>مزيد من التفاصيل</th>
                        <th></th>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">فيديوهات</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th>المدرب</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($videos)
                          @foreach ($videos as $video)
                            <tr>
                              <td><img src="{{ route("resources.video.thumbnail",$video->thumbnail) }}" width="30" height="30" class="mx-3" alt="">{{ $video->title }}</td>
                              <td>{{ $video->durartion }}</td>
                              <td><a target="_blank" href="{{ $video->file }}" class="btn btn-primary btn-sm">عرض</a></td>
                              <td>{{ $video->chef->fname }} {{ $video->chef->lname }}</td>
                              <td>
                                <form action="{{ route("admin.videos.delete",$video->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                              </form>
                            </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th>المدرب</th>
                        <th></th>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">بودكاستات</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($podcasts)
                          @foreach ($podcasts as $podcast)
                            <tr>
                              <td>{{ $podcast->title }}</td>
                              <td>{{ $podcast->duration }}</td>
                              <td>
                                <audio controls>
                                  <source src="{{ route('resources.podcast',$podcast->file) }}" type="audio/mp4">
                                </audio>
                              </td>
                              <td>
                                <form action="{{ route("admin.podcasts.delete",$podcast->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
                        <th>المدة الزمنية</th>
                        <th>الملف</th>
                        <th></th>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-12">
          <h2 class="h3 mb-3">ملفات تربوية</h2>
      </div>
      <div class="col-md-12">
          <div class="p-2 shadow-md rounded border border-warning">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <th>العنوان</th>
                        <th>النوع</th>
                        <th>الملف</th>
                        <th></th>
                      </thead>
                      <tbody>
                        @isset($materials)
                          @foreach ($materials as $material)
                            <tr>
                              <td>{{ $material->title}}</td>
                              <td>{{ $material->extention}}</td>
                              <td><a href="{{ $material->file}}" download="true" class="btn btn-sm btn-dark">تحميل</a></td>
                              <td>
                                <form action="{{ route("admin.materials.delete",$material->id) }}" method="post">
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        @endisset
                      </tbody>
                      <tfoot>
                        <th>العنوان</th>
                        <th>النوع</th>
                        <th>الملف</th>
                        <th></th>
                      </tfoot>
                  </table>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
