<x-admin-layout title="Blogs">
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

  <main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
      <div class="container-fluid"> <!--begin::Row-->
        <div class="row">
          <div class="col-sm-6">
            <h3 class="mb-0">Blogs</h3>
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
          @if (session()->has('success'))
        <div class="alert alert-success"> {{ session()->get('success') }}</div>
      @endif
          <div class="card-header">
            <div class="card-title">Add Blog</div>
          </div> <!--end::Header--> <!--begin::Form-->

          <form action="{{ route('admin.edit.addBlogs') }}" method="POST" enctype="multipart/form-data">
            <!--begin::Body-->
            @csrf
            <div class="card-body">

              <div class="d-flex">

                @foreach ($languages as $lang)
          <a href="{{ route('admin.edit.addBlogs', $lang->name) }}"
            class="btn btn-{{ $lang->name == $lan ? 'primary' : 'secondary' }} me-3">
            {{ strtoupper($lang->name) }} </a>
        @endforeach
              </div>
              <br>
              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Blog Title
                  {{ $lan }}</label> <input type="title" name="title[{{$lan}}]" class="form-control"
                  id="exampleInputPassword1"> </div>
              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Blog Content
                  {{ $lan }}</label>
                <div id="quill-editor" class="mb-3" style="height: 300px;"></div> <textarea rows="3" class="mb-3 d-none"
                  name="content[{{$lan}}]" id="quill-editor-area"></textarea>
                <div class="mb-3"> <label for="description" class="form-label">Blog Description
                    {{ $lan }}</label> <textarea type="title" name="description[{{$lan}}]"
                    class="form-control" id="description"></textarea>
                </div>
              </div>

              <div class="mb-3"> <label for="exampleInputPassword1" class="form-label">Category</label>
                <select name="category_id" class="form-select" aria-label="Default select example">
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
        <!--begin::Row-->
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>

              @foreach ($languages as $language)
          <th scope="col">Title {{ $language->name }}</th>
        @endforeach
              @foreach ($languages as $language)
          <th scope="col">Description {{ $language->name }}</th>
        @endforeach
              <th scope="col">Category</th>
              @foreach ($languages as $language)
          <th scope="col">Content {{ $language->name }}</th>
        @endforeach
              <th scope="col">Slug</th>
              <th scope="col">CreateAt</th>
              <th scope="col">thumnail</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($blogs as $blog)
              <t>
                <th scope="row">{{ $blog->id }} </th>
                @foreach ($languages as $language)
          @isset($blog->getTranslations('title')[$language->name])
        <td>{{$blog->getTranslations('title')[$language->name]}}</td>
      @else
      <td></td>
    @endisset
        @endforeach
                @foreach ($languages as $language)
          @isset($blog->getTranslations('description')[$language->name])
        <td>{{$blog->getTranslations('description')[$language->name]}}</td>
      @else
      <td></td>
    @endisset
        @endforeach
                @php
            foreach ($categories as $category) {
            if ($blog->category_id == $category->id) {
            $blog->category_id = $category->title;
            break;
            }
            }
         @endphp
                <td scope="col">{{ $blog->category_id }}</td>
                @foreach ($languages as $language)
          @isset($blog->getTranslations('content')[$language->name])
        <td>{{$blog->getTranslations('content')[$language->name]}}</td>
      @else
      <td></td>
    @endisset
        @endforeach
                <td>{{$blog->slug }}</td>
                <td>{{$blog->created_at}}</td>


                <td><img src="{{asset($blog->thumbnail)}}" width="50px" height="50px" alt=""></td>

                <td class="d-flex gap-2"><a href="{{ route('admin.edit.editblog', $blog->id) }} "
                  class="btn btn-info">Edit</a><a href="{{ route('admin.edit.deleteBlog', $blog->id) }}"
                  class="btn btn-danger">Delete</a></td>
                </tr>
        @endforeach
          </tbody>
        </table>
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
