<x-admin-layout title="Editing Blog">
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Edit BLog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Menus
              </li>
            </ol>
          </div>
        </div> <!--end::Row-->
      </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
      <div class="container-fluid">
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->

          <div class="card-header">
            <div class="card-title">Update Blog</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.editingBlog', $blog->id) }}" method="POST" enctype="multipart/form-data">

            <!--begin::Body-->
            @csrf
            <div class="card-body">
              <div class="d-flex">
                @foreach ($languages as $lang)
          <a href="{{ url()->current() }}?lan={{ $lang->name }}"
            class="btn btn-{{ $lang->name == $lan ? 'primary' : 'secondary' }} me-3">
            {{ strtoupper($lang->name) }} </a>
        @endforeach
              </div>

              <br>
              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Blog Title
                  {{ $lan }}</label> <input type="title" value="{{ $blog->getTranslations('title')[$lan] ?? $blog->title }}" name="title[{{$lan}}]" class="form-control"
                  id="exampleInputPassword1"> </div>
              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Blog Content
                  {{ $lan }}</label>
                <div id="quill-editor" class="mb-3" style="height: 300px;">
                  {!! isset($blog->getTranslations('content')[$lan])? $blog->getTranslations('content')[$lan] : $blog->content !!}
                </div> <textarea rows="3" class="mb-3 d-none"
                  name="content[{{$lan}}]" id="quill-editor-area"></textarea>
                <div class="mb-3"> <label for="description" class="form-label">Blog Description
                  
                    {{ $lan }}</label> <textarea type="title" value="{{ $blog->description }}" name="description[{{$lan}}]" class="form-control"
                    id="description"></textarea>
                </div>
              </div>

              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Category</label>
                <select name="category_id" class="form-select"  aria-label="Default select example">
                  @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
                </select>
              </div>

              <div class="input-group mb-3"> <input type="file" class="form-control" name="image" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer"> <button type="submit" class="btn btn-primary">Add</button> </div>
            <!--end::Footer-->
          </form> <!--end::Form-->
        </div>
      </div> <!--end::Container-->
    </div> <!--end::App Content-->
  </main> <!--end::App Main--> <!--begin::Footer-->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

  <!-- Initialize Quill editor -->
  <script>
    const quill = new Quill('#quill-editor', {
      theme: 'snow',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [{ 'header': 1 }, { 'header': 2 }],
          [{ 'list': 'ordered' }, { 'list': 'bullet' }],
          [{ 'script': 'sub' }, { 'script': 'super' }],
          [{ 'indent': '-1' }, { 'indent': '+1' }],
          [{ 'direction': 'rtl' }],
          [{ 'size': ['small', false, 'large', 'huge'] }],
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'color': [] }, { 'background': [] }],
          [{ 'font': [] }],
          [{ 'align': [] }],
          ['clean'],
          ['link', 'image', 'video']
        ]
      }
    })
    let quillEditor = document.getElementById('quill-editor-area');
    quill.on('text-change', function () {
      quillEditor.value = quill.root.innerHTML;

    })
    
  </script>
</x-admin-layout>
