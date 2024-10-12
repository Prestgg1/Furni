<x-admin-layout title="Languages">
  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Languages</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Languages
              </li>
            </ol>
          </div>
        </div> <!--end::Row-->
      </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
      <div class="container-fluid"> 
        
      <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
      @if (session()->has('success'))
                                    <div class="alert alert-success">  {{ session()->get('success') }}</div>
                                @endif
                                <div class="card-header">
                                    <div class="card-title">Add Language</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                               
                                <form action="{{ route('admin.edit.editingLanguages', $language->id) }}" method="POST"> <!--begin::Body-->
                                  @csrf
                                    <div class="card-body">
                                      <input type="text" name="id" value="{{ $language->id }}" hidden>
                                        <div class="mb-3"> <label for="exampleInputEmail1" class="form-label">Name</label> <input type="text" class="form-control" value="{{ $language->name }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Title</label> <input type="title" name="title" value="{{ $language->title }}" class="form-control" id="exampleInputPassword1"> </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div>
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
</x-admin-layout>
