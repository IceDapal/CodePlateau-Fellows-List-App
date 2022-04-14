@extends('layout.app')

@section('content')

{{-- Heroes one --}}
<div class="hero">
    <div class="container col-xxl-8 ">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-lg-6">
          <img style="border-radius: 20px;" src="/img/cp.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3" style="color: #033652">CodePlateau 3.0 Fellows Lists</h1>
          <p>At the end of the Code Plateau training, trainees are expected to be able to build impressive, portfolio-ready projects that will demonstrate their ability to add value to their new job as software engineers. This intensive program is for those who are committed to having tangible, job-ready skills upon graduation.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 shadow-none" data-bs-toggle="modal" data-bs-target="#addFellowModal" style="font-size: 14px; color: white;">Add a Fellow</button>
          </div>
        </div>
      </div>
    </div>
    </div>
{{-- end of heroes one  --}}


{{-- List of Fellows  --}}

<div class="container">
<div class="shadow p-3 mb-5 bg-light rounded">
    @if(count($fellows) > 0)
    <table class="table table-hover">
        <thead style="font-weight: bold; background-color: #003450; color: #f0f0f0; font-size: 14px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        ">
        <tr>
    
            <td>ID</td>
            <td>FIRST NAME</td>
            <td>LAST NAME</td>
            <td>ACTION</td>
            
    
    
        </tr>
        </thead>
        
        <tbody>
            @foreach($fellows as $fellow)
            <tr>
    
                <td>{{$fellow->id}}</td>
                <td>{{$fellow->f_name}}</td>
                <td>{{$fellow->l_name}}</td>
                <td>
                    <a href="/fellows/{{$fellow->id}}/edit" class="btn btn-sm btn-outline-primary shadow-none" style="font-size: 13px;">Edit Fellow</a>
                    <a href="{{ URL::to('fellows/'.$fellow->id.'/delete') }}" class="btn btn-sm btn-outline-danger shadow-none" style="font-size: 13px;">Delete</a>
                </td>
        
            </tr>
            @endforeach
        </tbody>
    
    </table>
    {{$fellows->links('pagination::bootstrap-5')}}

    @else

    <p>No Records found!</p>

    @endif
</div>
    </div>

{{-- End of list  --}}


{{-- Add Fellow Modal  --}}


<div class="modal fade" id="addFellowModal" tabindex="-1" aria-labelledby="addFellowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addFellowModalLabel">Add New Fellow</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

              <form action="/fellow" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control shadow-sm" name="f_name" placeholder="First Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control shadow-sm" name="l_name" placeholder="Last name">
                </div>
                <div class="mb-3 shadow-none">
                <input type="submit" class="btn btn-sm btn-primary mb-3 shadow-none" value="Add Fellow">
                </div>
                </form>
               
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>


  {{-- end of Moddal  --}}

  

@endsection