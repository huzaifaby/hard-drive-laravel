<div class="table-data table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $key=>$blog)
                    <tr>
                        <td>{{ $blog->blog_title }}</td>
                        <td>{{ $blog->blog_category }}</td>
                        <td>{{ $blog->created_at }}</td>
                        <td>
                            <a href="{{ url('dashboard/edit-blog/' . $blog->id) }}" class="btn btn-success">
                                <i class="fas fa-edit"></i></a>

                            <a href="" data-id="{{ $blog->id }}" class="btn btn-danger delete_blogs">
                                <i class="las la-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $blogs->links() !!}