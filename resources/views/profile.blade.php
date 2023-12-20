@include('navigation')
<style>
    /* body {
    background: rgb(99, 39, 120)
} */

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
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
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
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
            <!-- <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div> -->
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
</body>
