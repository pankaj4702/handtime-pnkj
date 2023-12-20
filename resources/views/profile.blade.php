@include('navigation')
<style>
   #cameraIcon {
    position: absolute;
    top: 37%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;
    color: #4a4848;
    font-size: 24px;
    background: #a1a0a0;
    padding: 0px 50px;
    opacity: 0.6;
    border-radius: 15px;
}
    #fileImage {
            cursor: pointer;
        }
    #fileInput {
            display: none; /* Hide the input */
        }
</style>
<script>
    jQuery(document).ready(function () {
      jQuery("#phone-edit").keypress(function (e) {
         var length = jQuery(this).val().length;
       if(length > 9) {
            return false;
       } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
       } else if((length == 0) && (e.which == 48)) {
            return false;
       }
      });
    });
</script>
<body>
    <div class="profile-body">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div id="imageContainer">
                <i id="cameraIcon" class="fas fa-camera" onclick="chooseFile()"></i>
                @if($user->image == null)
                <img id="fileImage" class="rounded-circle mt-5" width="150px"  src="{{ asset('storage/uploads/default_image.png') }}" onclick="chooseFile()">
                @else
                <img id="fileImage" class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . $user->image) }}" onclick="chooseFile()">
                @endif
                </div>
                <form id="yourFormId" enctype="multipart/form-data">
                <input id="fileInput" type="file" onchange="displaySelectedFile(this)" accept="image/*">
                </form><br>
                <span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile </h4>
                </div>
                @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
                <form action="/profile-update" method="POST">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="first name" value="{{$user->name}}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" id="phone-edit" name="phone" class="form-control" placeholder="enter phone number" value="{{$user->phone}}"></div>
                    <div class="col-md-12"><label class="labels">city</label><input type="text" name="city" class="form-control" placeholder="enter address city" value="{{$user->city}}"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="{{$user->email}}" disabled ></div>
                    <div class="col-md-12"><label class="labels">Old password</label><input type="password" name="old_password" class="form-control" placeholder="old password" value=""></div>
                    <div class="col-md-12"><label class="labels">New password</label><input type="password" name="new_password" class="form-control" placeholder="new password" value=""></div>
                </div>
                <br><br>
            <div class="btn btn-primary profile-button">
        <input type="submit" class="btn btn-primary profile-button" value="Save Profile">
      </div>
      </form>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-4 border-right">
       <h1 style="text-align: center;">Reviews</h1>
    </div>

</div>
</div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    var phoneInput = document.getElementById("phone-edit");

    phoneInput.addEventListener("keypress", function (e) {
        var length = this.value.length;

        if (length > 9) {
            e.preventDefault();
        } else if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            e.preventDefault();
        } else if (length === 0 && e.which === 48) {
            e.preventDefault();
        }
    });
    });
</script>
<script>
    // Function to trigger the hidden file input
    function chooseFile() {
        document.getElementById('fileInput').click();
    }

    // Function to display the selected file name (you can customize this)
    function displaySelectedFile(input) {
        var file = input.files[0];
        var fileName = file ? file.name : 'No file chosen';
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('image', file);
        $.ajax({
                  url: "{{ route('addImage') }}",
                  type: 'POST',
                  data: formData,
                  processData: false,
                  contentType: false,
                  success: function(response) {
                     if(response.status == 1){
                        // $('#fileImage').addClass('d-none');
                        $('#fileImage').removeAttr('src');
                        $('#fileImage').attr('src', "{{ asset('storage/') }}/" + response.imagePath);


                     }
                  },
                  error: function(error) {
                    // def-fileImage

                  }
                });
    }
</script>
</body>
