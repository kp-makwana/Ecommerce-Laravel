<!--modal-->
<div id="change_password" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-center col-md-10">Change Password</h2>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="panel-body">
                                <form action="{{ route('user.profile.changePassword') }}" id="form" method="POST"
                                      onsubmit="return formSubmit()">
                                    @csrf
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="Current Password"
                                                   name="c_password" id="c_password" type="password">
                                            <p id="pass_not_match" class="text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="New Password"
                                                   name="pass" id="pass" type="password">
                                            <span class="text-danger" id="pass_error"></span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="Confirm New Password"
                                                   name="c_new_password" id="c_new_password" type="password">
                                            <span id="c_pass_error" class="text-danger"></span>
                                        </div>
                                        <input class="btn btn-lg btn-primary btn-block" id="submit"
                                               type="button" value="submit">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $("#c_password").focusout(function () {
        var password = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('user.profile.checkPassword') }}',
            data: {
                password: password,
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                // alert(data);
                if (data == false) {
                    $("#pass_not_match").html("Password Not Match");
                    $("#c_password").focus();
                    // alert(data);
                } else {
                    $("#pass_not_match").html("");
                }
            },
        });
    });
    </script>
<script>
    $('#change_password').on('hidden.bs.modal', function () {
        $('#change_password form')[0].reset();
        $("#pass_not_match").html("");
        $("#pass_error").html("");
        $("#c_pass_error").html("");
    });
</script>
<script>
    // $('#new_password,#c_new_password').on('keyup',function () {
    //     if ($('#new_password').val() == $('#c_new_password').val()) {
    //         $('#message').html('Matching').css('color', 'green');
    //     } else{
    //         $('#message').html('Not Matching').css('color', 'red');
    //     }
    // });
</script>
<script>
    {{--$(function(){--}}
    {{--    $("#form").on("submit", function(){--}}
    {{--        if ($('#new_password').val() == $('#c_new_password').val()) {--}}
    {{--            $.ajax({--}}
    {{--                url: '{{ route('user.profile.changePassword') }}',--}}
    {{--                type: 'POST',--}}
    {{--                data: $('#request').serialize(),--}}
    {{--                success: function() {--}}
    {{--                    alert($('#request').serialize());--}}
    {{--                }--}}
    {{--            });--}}
    {{--        } else{--}}
    {{--            $('#message').html('Not Matching').css('color', 'red');--}}
    {{--        }--}}

    {{--        // e.preventDefault();--}}
    {{--    });--}}
    {{--});--}}

    // function formSubmit() {

    $("#submit").click(function () {
        var hasError = false;
        var passwordVal = $("#pass").val();
        var checkVal = $("#c_new_password").val();
        // $("#pass_error").innerHTML("");
        // $("#c_pass_error").innerHTML("");
        if (passwordVal == '') {
            $("#pass_error").html('');
            $("#pass_error").html('Please enter a password.');
            return false;
        } else if (checkVal == '') {
            $("#pass_error").html('');
            $("#c_pass_error").html('');
            $("#c_pass_error").html('Please re-enter your password.');
            return false;
        } else if (passwordVal != checkVal) {
            $("#pass_error").html('');
            $("#c_pass_error").html('');
            $("#c_pass_error").html('Passwords do not match.');
            return false;
        }
        else {

            alert("here");
        }
    });
</script>
