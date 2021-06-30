<!--modal-->
<div id="change_password" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-center col-md-10">Change Password</h2>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="resetPop()">×</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="panel-body">
                                <form action="" id="form">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="Current Password"
                                                   name="c_password" id="c_password" type="password">
                                            <p id="pass_not_match" class="text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="New Password"
                                                   name="new_password" id="new_password" type="password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control input-lg" placeholder="Confirm New Password"
                                                   name="c_new_password" id="c_new_password" type="password">
                                        </div>
                                        <input class="btn btn-lg btn-primary btn-block" value="Change Password"
                                               type="submit">
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
    function resetPop() {

    }

    $("#c_password").focusout(function(){
        $.ajax({
            type: 'POST',
            url: '{{ route('user.profile.changePassword') }}',
            data: {
                password:$(this).val(),
                "_token": "{{ csrf_token() }}"
            },
            success: function (data ) {
                if (data == false)
                {
                    $("#pass_not_match").html("Password Not Match");
                    $("#c_password").focus();
                }
            },
        });
    });

    $('#change_password').on('hidden.bs.modal', function () {
        $('#change_password form')[0].reset();
        $("#pass_not_match").html("");
    });
</script>
