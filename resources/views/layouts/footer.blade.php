<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">

            </div>
            <div class="app-footer-right">
                <div class="text-center  opacity-8 mt-3">Copyright © New Admin 2024</div>
            </div>
        </div>

    </div>

</div>

<div class="app-drawer-overlay d-none animated fadeIn"></div><!--DRAWER END-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


<!--CORE-->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
<script src="../assets/js/scripts-init/app.js"></script>
<script src="../assets/js/scripts-init/demo.js"></script>

<!--CHARTS-->

<!--Apex Charts-->
<script src="../assets/js/vendors/charts/apex-charts.js"></script>

<script src="../assets/js/scripts-init/charts/apex-charts.js"></script>
<script src="../assets/js/scripts-init/charts/apex-series.js"></script>

<!--Sparklines-->
<script src="../assets/js/vendors/charts/charts-sparklines.js"></script>
<script src="../assets/js/scripts-init/charts/charts-sparklines.js"></script>

<!--Chart.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="../assets/js/scripts-init/charts/chartsjs-utils.js"></script>
<script src="../assets/js/scripts-init/charts/chartjs.js"></script>

<script>
    const STATUS_ACTIVE =   {{config('constants.STATUS_ACTIVE') }};
    const STATUS_INACTIVE = {{ config('constants.STATUS_INACTIVE') }};
    const STATUS_DELETED = {{ config('constants.STATUS_DELETED') }};
</script>

<script>
function addcountry(){
    $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        CountryAddEdit('Country Add', 'Add');

}
function CountryAddEdit(title, buttonText, id = null) {
        $('#CountryAddEditModalLabel').text(title);
        $('#CountryButton').text(buttonText);
        $('#CountryformData')[0].reset();
        if (id) {
            $.get('/testimonial_details/' + id, function(data) {
                $('#testimonial_id').val(data.id);
                $('#Name').val(data.name);
                $('#company_name').val(data.company_name);
                $('#description').val(data.description);
                $('input[name="status"][value="' + data.status + '"]').prop('checked', true);
                var imageHtml = '<img src="' + data.imagepath + '/' + data.imageName + '">';

                var removeOptionHtml = '<a id="remove_image" style="position: absolute;" onclick="delete_image()">' +
                    '<i class="fa fa-trash text-danger fa-md" style="margin-left: 10px; margin-top: 0px;"></i>' +
                    '</a>';

                $('#image_preview').html(imageHtml + removeOptionHtml);
                $('#image_filename').val(data.imageName);
                $('#display_order').val(data.display_order);

            });

        }
        $('#CountryModal').modal('show');

    }

</script>
<script>
    function add() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        testimonialAddEdit('Testimonial Add', 'Add');
    }

    function edit(element) {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        var id = $(element).data('id');
        testimonialAddEdit('Edit', 'Update', id);
    };


    function testimonialAddEdit(title, buttonText, id = null) {
        $('#testimonialAddEditModalLabel').text(title);
        $('#testimonialButton').text(buttonText);
        $('#testimonialData')[0].reset();
        $('#image_preview').html('');
        $('#remove_image').hide();
        $('#image_filename').val('');
        if (id) {
            $.get('/testimonial_details/' + id, function(data) {
                $('#testimonial_id').val(data.id);
                $('#Name').val(data.name);
                $('#company_name').val(data.company_name);
                $('#description').val(data.description);
                $('input[name="status"][value="' + data.status + '"]').prop('checked', true);
                var imageHtml = '<img src="' + data.imagepath + '/' + data.imageName + '">';

                var removeOptionHtml = '<a id="remove_image" style="position: absolute;" onclick="delete_image()">' +
                    '<i class="fa fa-trash text-danger fa-md" style="margin-left: 10px; margin-top: 0px;"></i>' +
                    '</a>';

                $('#image_preview').html(imageHtml + removeOptionHtml);
                $('#image_filename').val(data.imageName);
                $('#display_order').val(data.display_order);

            });

        }
        $('#testimonialModel').modal('show');

    }
    $('#testimonialButton').click(function() {
        var data = $("#testimonialData").serializeArray();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = $('#testimonial_id').val() ? '/edit_testimonial/' + $('#testimonial_id').val() : '/add_testimonial';


        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                localStorage.setItem('successMessage', response.message);
                window.location.reload(true);
                $('#testimonialModel').modal('hide');
                $('#testimonialData')[0].reset();

            },

            error: function(xhr, status, error) {

                var errors = xhr.responseJSON.errors;
                if (errors) {

                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            }
        });
    });



    $(document).ready(function() {
        $('#logo_upload').change(function() {
            var formData = new FormData();
            formData.append('file', this.files[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/upload_file',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);

                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    function upload_file_logo(file) {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function(e) {
            console.log(e);
            $('#image_preview').html('<img src="' + e.target.result + '" alt="Image Preview" style="max-width: 200px; max-height: 200px;">');
            $('#remove_image').show();
        }
        reader.readAsDataURL(file);
        console.log(file);

        $('#image_filename').val(file.name);
    }

    function delete_image() {
        $('#image_preview').html('');
        $('#remove_image').hide();
        $('#image_filename').val('');
    }


    $('.testimonial').change(function() {
        var id = $(this).data('id');
        var status = this.checked ? 1 : 0;
        console.log(status);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/notify_testimonial_status',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {


            },
            error: function(msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }
        });
    });

    function remove(element) {

        var id = $(element).attr('id');
        if (confirm("Are you sure to delete this user?")) {
            $.ajax({
                type: 'DELETE',
                url: '/delete_testimonal/' + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload(true);
                    var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

                    // Append the alert to the container
                    $('#successMessageContainer').html(alertHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }


    }
</script>



<script>
    $('#notificationaddButton').click(function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        notificationaAddEdit('Add', 'Add');
    });


    $('#notification').on('click', '.notificationEditButton', function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        var id = $(this).data('id');
        notificationaAddEdit('Edit', 'Update', id);
    });

    function notificationaAddEdit(title, buttonText, id = null) {
        $('#notificationAddEditModalLabel').text(title);
        $('#notificationButton').text(buttonText);
        $('#notificationData')[0].reset();
        if (id) {
            console.log(" ID:", id);
            $.get('/get_notification_data/' + id, function(data) {
                console.log(data);
                $('#template_id').val(data[0].notification_template_id);
                $('#notify_template_name').val(data[0].template_for);
                $('#Template_Key').val(data[0].template_key);
                $('#Content').val(data[0].template_content);
                $('#Template_Keys').val(data[0].all_template_keys);
                $('#display_order').val(data[0].display_order);


            });

        }
        $('#notificationModel').modal('show');

    }
    $('.notify_templete').change(function() {
        var id = $(this).data('id');
        var status = this.checked ? 1 : 0;
        console.log(status);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/notify_template_status',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {


            },
            error: function(msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }
        });
    });


    $('#notificationButton').click(function() {
        var data = $("#notificationData").serializeArray();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = $('#template_id').val() ? '/edit_notification/' + $('#template_id').val() : '/add_notification';


        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);

                localStorage.setItem('successMessage', response.message);
                window.location.reload(true);

                $('#notificationModel').modal('hide');
                $('#notificationData')[0].reset();

            },

            error: function(xhr, status, error) {

                var errors = xhr.responseJSON.errors;
                if (errors) {

                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            }
        });
    });

    $('.delete-noti').click(function() {
        var id = $(this).attr('id');
        if (confirm("Are you sure to delete this user?")) {
            $.ajax({
                type: 'DELETE',
                url: '/delete_notification/' + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    window.location.reload(true);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>


<!------------------------------For email_templete--------------------------->
<script>
    $('.toggle-class').change(function() {
        var id = $(this).data('id');
        var status = this.checked ? 1 : 0;
        console.log(status);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/mail_toggle_status',
            data: {
                'status': status,
                'id': id
            },
            success: function(data) {


            },
            error: function(msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }
        });
    });

    $('#mailaddButton').click(function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        mailAddEdit('Add', 'Add');
    });

    $('#mail').on('click', '.mailEditButton', function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        var id = $(this).data('id');
        mailAddEdit('Edit', 'Update', id);
    });

    function mailAddEdit(title, buttonText, id = null) {

        $('#mailAddEditModalLabel').text(title);
        $('#mailButton').text(buttonText);
        $('#mailformData')[0].reset();

        if (id) {

            console.log(" ID:", id);
            $.get('/get_mail_data/' + id, function(data) {

                $('#template_id').val(data.template_id);
                $('#Template_name').val(data.template_for);
                $('#Template_Type').val(data.template_type);
                $('#Subject').val(data.template_subject);
                $('#Content').val(data.template_content);
                $('#Template_Keys').val(data.template_keys);
                $('#display_order').val(data.display_order);


            });

        }


        $('#mailModel').modal('show');
    }


    $('#mailButton').click(function() {
        var data = $("#mailformData").serializeArray();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = $('#template_id').val() ? '/edit_mail/' + $('#template_id').val() : '/add_mail';


        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);

                localStorage.setItem('successMessage', response.message);
                window.location.reload(true);

                $('#mailModel').modal('hide');
                $('#mailformData')[0].reset();

            },

            error: function(xhr, status, error) {

                var errors = xhr.responseJSON.errors;
                if (errors) {

                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            }
        });
    });


    $('.delete-email').click(function() {
        var id = $(this).attr('id');
        console.log(id);
        if (confirm("Are you sure to delete this user?")) {
            $.ajax({
                type: 'DELETE',
                url: '/delete_mail/' + id,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {



                    localStorage.setItem('successMessage', response.message);

                    window.location.reload(true);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
</script>
<!------------------------------For All Settings--------------------------->
<script>
    $('#search').on('input', function() {
        var inputValue = $(this).val();
        var groupKey = $(this).attr('group_key');
        console.log('groupKey', groupKey);
        $.ajax({
            type: 'POST',
            url: '/settings_search',
            data: {
                name: inputValue,
                groupKey: groupKey,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                $('#allSettingBody').empty();
                console.log("Response length:", response.length);

                response.forEach(function(result) {

                    var row = '<tr>' +
                        '<td>' + result.title + '</td>' +
                        '<td>' + result.setting_key + '</td>' +
                        '<td style="width:40%;word-break: break-all;">' + result.setting_value + '</td>' +
                        '<td class="text-right" style="padding-right:15px;">' +
                        (result.editable != 0 ? '<a data-toggle="tooltip" title="Edit" class="allSettingsEditButton" data-placement="top" data-original-title="Edit" id="' + result.id + '"><i class="fa fa-edit text-success fa-md"></i></a>&nbsp;' : '') +
                        '</td>' +
                        '</tr>';


                    $('#allSettingBody').append(row);

                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


    $('#allSettingsaddButton').click(function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        SettingAddEdit('Add New Setting', 'Add');
    });

    $('#allSettingBody').on('click', '.allSettingsEditButton', function() {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').empty();
        var SettingsId = $(this).attr('id');
        SettingAddEdit('Edit Settings', 'Update', SettingsId);
    });

    function SettingAddEdit(title, buttonText, SettingsId = null) {
        $('#Groups').hide();
        $('#Editable').show();
        $('#Deletable').show();
        $('#settingsAddEditModalLabel').text(title);
        $('#SettingsButton').text(buttonText);
        $('#settinngsformData')[0].reset();
        $('#setting_Key').prop('readonly', false);
        if (SettingsId) {
            $('#Groups').show();

            console.log("Settings ID:", SettingsId);
            $.get('/get_allSettings_data/' + SettingsId, function(data) {

                $('#settingsId').val(data.id);
                $('#setting_name').val(data.title);
                $('#setting_Key').val(data.setting_key);
                $('#setting_Value').val(data.setting_value);
                if (data.setting_group == "") {
                    $('#Groups_data').attr('default');
                } else {
                    $('#Groups_data').val(data.setting_group);
                }
                $('#setting_name').val(data.title);
                $('#setting_name').val(data.title);
            });
            $('#setting_Key').prop('readonly', true);
            $('#Editable').hide();
            $('#Deletable').hide();
        }


        $('#SettingsModel').modal('show');
    }

    $('#SettingsButton').click(function() {
        var data = $("#settinngsformData").serializeArray();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = $('#settingsId').val() ? '/edit_allSettings_group/' + $('#settingsId').val() : '/add_allSettings_group';


        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {


                localStorage.setItem('successMessage', response.message);
                window.location.reload(true);

                $('#SettingsModel').modal('hide');
                $('#settinngsformData')[0].reset();

            },

            error: function(xhr, status, error) {

                var errors = xhr.responseJSON.errors;
                if (errors) {

                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            }
        });
    });
</script>


<!------------------------------For Settings--------------------------->

<script>
    $(document).ready(function() {

        $('#SettingsButton').click(function() {
            var data = $("#settinngsformData").serializeArray();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $('#groupId').val() ? '/edit_Settings_group/' + $('#groupId').val() : '/add_Settings_group';

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {


                    $('#SettingsModel').modal('hide');
                    $('#settinngsformData')[0].reset();
                    fetchsettingsGrData();
                    var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

                    $('#successMessageContainer').html(alertHtml);
                },

                error: function(xhr, status, error) {

                    var errors = xhr.responseJSON.errors;
                    if (errors) {

                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        });

        function fetchsettingsGrData() {
            $.get('/get_Settings', function(data) {
                $('#Settings').empty();
                $.each(data, function(index, Settings) {
                    if (Settings.status != -1) {
                        $('#Settings').append(
                            '<tr>' +
                            '<td>' + '<input type="checkbox" class="check_all magic-checkbox"  name="ID[]" value=' + Settings.id + 'id="item_1">' + '</td>' +
                            '<td>' + Settings.setting_group_id + '</td>' +
                            '<td>' + Settings.group_name + '</td>' +
                            '<td class="settings">' +
                            '<span class="badge ' + (Settings.status == STATUS_ACTIVE ? 'badge-success' : 'badge-danger') + '">' + (Settings.status == STATUS_ACTIVE ? 'Active' : 'Inactive') + '</span>' +
                            '</td>' +
                            '<td class="text-right">' +
                            '<i class="fa fa-edit text-success fa-md SettingsEditButton" SettingsId="' + Settings.setting_group_id + '"></i>' + ' ' +
                            '<i class="fa fa-trash text-danger fa-md SettingsDeleteButton" SettingsId="' + Settings.setting_group_id + '"></i></a>' +
                            '</td>' +
                            '</tr>'
                        );
                    }
                });
            });
        }


        $(document).on('click', '.settings', function() {
            var SettingsId = $(this).closest('tr').find('.SettingsEditButton').attr('SettingsId');

            var currentStatus = $(this).find('.badge').text().trim();
            var newStatus = currentStatus == 1 ? 1 : 0;


            $.ajax({
                type: 'POST',
                url: '/settings_toggle_status',
                data: {
                    SettingsId: SettingsId,
                    status: newStatus,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {

                        $('#Settings tbody').empty();
                        fetchsettingsGrData();
                    } else {
                        console.error('Failed to toggle user status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });


        $('#Settings').on('click', '.SettingsEditButton', function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            var SettingsId = $(this).attr('SettingsId');

            SettingAddEdit('Edit Settings Groups', 'Update', SettingsId);
        });


        $('#SettingsaddButton').click(function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            SettingAddEdit('Add New Setting Groups', 'Add');
        });

        function SettingAddEdit(title, buttonText, SettingsId = null) {
            $('#settingsAddEditModalLabel').text(title);
            $('#SettingsButton').text(buttonText);
            $('#settinngsformData')[0].reset();
            if (SettingsId) {

                $.get('/get_Settings_data/' + SettingsId, function(data) {
                    $('#groupId').val(data.setting_group_id);
                    $('#group_name').val(data.group_name);
                    $('#group_Key').val(data.group_key);
                    $('input[name=status][value="' + data.status + '"]').prop('checked', true);
                });
            }

            $('#SettingsModel').modal('show');
        }

        $('#Settings').on('click', '.SettingsDeleteButton', function() {
            var setting_group_id = $(this).attr('SettingsId');
            if (confirm("Are you sure to delete this user?")) {
                $.ajax({
                    type: 'DELETE',
                    url: '/delete_setting_group/' + setting_group_id,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        fetchsettingsGrData();
                        var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;


                        $('#successMessageContainer').html(alertHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        fetchsettingsGrData();
    });
</script>



<!------------------------------For Notification--------------------------->
<script>
    $(document).ready(function() {

        function showSuccessMessage(message) {
            var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
            <span>${message}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;
            $('#successMessageContainer').html(alertHtml);
        }
        $('.toggle-class').change(function() {
            var id = $(this).data('id');
            var status = this.checked ? 1 : 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/changeStatus',
                data: {
                    'status': status,
                    'user_id': id
                },
                success: function(data) {

                    showSuccessMessage('Status updated successfully.');
                },
                error: function(msg) {
                    console.log(msg);
                    var errors = msg.responseJSON;
                }
            });
        });
    });

    $(document).ready(function() {
        $('.delete-notification').click(function() {
            var id = $(this).attr('id');

            if (confirm("Are you sure to delete this user?")) {
                $.ajax({
                    type: 'DELETE',
                    url: '/delete_notify/' + id,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {


                        localStorage.setItem('successMessage', response.message);

                        window.location.reload(true);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });


        var successMessage = localStorage.getItem('successMessage');
        if (successMessage) {
            var alertHtml = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ${successMessage}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;
            $('#successMessageContainer').html(alertHtml);


            localStorage.removeItem('successMessage');
        }
    });
</script>

<!-- For Role -->
<script>
    $(document).ready(function() {
        $('#RoleButton').click(function() {
            var data = $("#RoleformData").serializeArray();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $('#roleId').val() ? '/edit_role/' + $('#roleId').val() : '/add_role';

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {

                    $('#RoleModal').modal('hide');
                    $('#RoleformData')[0].reset();
                    fetchroleData();
                    var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;


                    $('#successMessageContainer').html(alertHtml);
                },

                error: function(xhr, status, error) {

                    var errors = xhr.responseJSON.errors;
                    if (errors) {

                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        });
        fetchroleData();
    });

    function fetchroleData() {
        $.get('/get_role_data', function(data) {
            $('#role').empty();
            $.each(data, function(index, role) {

                if (role.status != STATUS_DELETED) {
                    $('#role').append(
                        '<tr>' +
                        '<td>' + '<input type="checkbox" class="check_all magic-checkbox"  name="ID[]" value=' + role.id + 'id="item_1">' + '</td>' +
                        '<td>' + role.id + '</td>' +
                        '<td>' + role.name + '</td>' +
                        '<td class="Rolestatus">' +
                        '<span class="badge ' + (role.status == 1 ? 'badge-success' : 'badge-danger') + '">' + (role.status == 1 ? 'Active' : 'Inactive') + '</span>' +
                        '</td>' +
                        '<td class="text-right">' +
                        '<i class="fa fa-edit text-success fa-md RoleEditButton" roleId="' + role.id + '"></i>' + ' ' +
                        '<i class="fa fa-trash text-danger fa-md RoleDeleteButton" roleId="' + role.id + '"></i></a>' +
                        '</td>' +
                        '</tr>'
                    );
                }
            });
        });

        $('#role').on('click', '.RoleEditButton', function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            var roleId = $(this).attr('roleId');

            RoleAddEdit('Edit User', 'Update', roleId);
        });

        $('#role').on('click', '.RoleDeleteButton', function() {
            var roleId = $(this).attr('roleId');
            if (confirm("Are you sure to delete this user?")) {
                $.ajax({
                    type: 'DELETE',
                    url: '/delete_role/' + roleId,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        fetchroleData();
                        var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;


                        $('#successMessageContainer').html(alertHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#addRole').click(function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            RoleAddEdit('Add New Role', 'Add');
        });
    }

    function RoleAddEdit(title, buttonText, roleId = null) {
        $('#RoleAddEditModalLabel').text(title);
        $('#RoleButton').text(buttonText);
        $('#RoleformData')[0].reset();
        if (roleId) {

            $.get('/get_role_data/' + roleId, function(data) {
                $('#roleId').val(data.id);
                $('#name').val(data.name);
                $('input[name=status][value="' + data.status + '"]').prop('checked', true);
            });
        }

        $('#RoleModal').modal('show');
    }


    fetchroleData();

    $(document).on('click', '.Rolestatus', function() {
        var roleId = $(this).closest('tr').find('.RoleEditButton').attr('roleId');
        console.log(roleId);
        var currentStatus = $(this).find('.badge').text().trim();
        var newStatus = currentStatus == 1 ? 1 : 0;


        $.ajax({
            type: 'POST',
            url: '/role_toggle_status',
            data: {
                roleId: roleId,
                status: newStatus,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    fetchroleData();
                    $('#role tbody').empty();
                } else {
                    console.error('Failed to toggle user status.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>


<!-- For catagory -->
<script>
    $(document).ready(function() {
        $('#CategoryButton').click(function() {
            var data = $("#CategoryformData").serializeArray();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $('#catagoryId').val() ? '/edit_catagory/' + $('#catagoryId').val() : '/add_catagory';

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {

                    $('#CatagoryModal').modal('hide');
                    $('#CategoryformData')[0].reset();
                    fetchcatagoryData();
                    var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;


                    $('#successMessageContainer').html(alertHtml);
                },
                error: function(xhr, status, error) {

                    var errors = xhr.responseJSON.errors;
                    if (errors) {

                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
        });

        function fetchcatagoryData() {
            $.get('/get_catagory_data', function(data) {
                $('#catagory').empty();
                $.each(data, function(index, catagory) {

                    $('#catagory').append(
                        '<tr>' +
                        '<td>' + '<input type="checkbox" class="check_all magic-checkbox"  name="ID[]" value=' + catagory.id + 'id="item_1">' + '</td>' +
                        '<td>' + catagory.id + '</td>' +
                        '<td>' + catagory.name + '</td>' +
                        '<td class="Catagorystatus">' +
                        '<span class="badge ' + (catagory.status == STATUS_ACTIVE ? 'badge-success' : 'badge-danger') + '">' + (catagory.status == STATUS_ACTIVE ? 'Active' : 'Inactive') + '</span>' +
                        '</td>' +
                        '<td class="text-right">' +
                        '<i class="fa fa-edit text-success fa-md CatagoryEditButton" catagoryId="' + catagory.id + '"></i>' + ' ' +
                        '<i class="fa fa-trash text-danger fa-md CatagoryDeleteButton" catagoryId="' + catagory.id + '"></i></a>' +
                        '</td>' +
                        '</tr>'
                    );
                });
            });

            $('#catagory').on('click', '.CatagoryEditButton', function() {
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').empty();
                var catagoryId = $(this).attr('catagoryId');
                console.log(catagoryId);
                CatagoryAddEdit('Edit User', 'Update', catagoryId);
            });

            $('#catagory').on('click', '.CatagoryDeleteButton', function() {
                var catagoryId = $(this).attr('catagoryId');
                if (confirm("Are you sure to delete this user?")) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/delete_catagory/' + catagoryId,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            fetchcatagoryData();
                            var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;


                            $('#successMessageContainer').html(alertHtml);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            $('#addCatagory').click(function() {
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback').empty();
                // alert('f');
                CatagoryAddEdit('Add New Catagory', 'Add');
            });

            function CatagoryAddEdit(title, buttonText, catagoryId = null) {
                $('#CatagoryAddEditModalLabel').text(title);
                $('#CategoryButton').text(buttonText);
                $('#CategoryformData')[0].reset();
                if (catagoryId) {
                    console.log("catagory ID:", catagoryId);
                    $.get('/get_catagory_data/' + catagoryId, function(data) {
                        $('#catagoryId').val(data.id);
                        $('#name').val(data.name);
                        $('input[name=status][value="' + data.status + '"]').prop('checked', true);
                    });
                }
                // Show the modal
                $('#CatagoryModal').modal('show');

            }
        }

        fetchcatagoryData();

        $(document).on('click', '.Catagorystatus', function() {
            var catagoryId = $(this).closest('tr').find('.CatagoryEditButton').attr('catagoryId');
            console.log(catagoryId);
            var currentStatus = $(this).find('.badge').text().trim();

            var newStatus = currentStatus == STATUS_ACTIVE ? STATUS_ACTIVE : STATUS_INACTIVE;


            $.ajax({
                type: 'POST',
                url: '/catagory_toggle_status',
                data: {
                    catagoryId: catagoryId,
                    status: newStatus,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        fetchcatagoryData();
                        $('#catagory tbody').empty();
                    } else {
                        console.error('Failed to toggle user status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<!-- For Admin User -->
<script>
    $(document).ready(function() {
        function openAddEditModal(title, buttonText, userId = null) {
            $('#addEditModalLabel').text(title);
            $('#saveChangesButton').text(buttonText);
            $('#formData')[0].reset(); // Reset form fields
            $('#password').closest('.form-group').show();
            if (userId) {
                $('#password').closest('.form-group').hide();
                // Editing mode: populate form fields with existing user data
                console.log("User ID:", userId); // Debugging statement
                $.get('/get_data/' + userId, function(data) {
                    $('#userId').val(data.id);
                    $('#username').val(data.username);
                    $('#name').val(data.full_name);
                    $('#email').val(data.email);
                    $('#userRole').val(data.role_id);
                    $('input[name=status][value="' + data.status + '"]').prop('checked', true);
                });
            }

            // Show the modal
            $('#MainModel').modal('show');
        }

        // Event listener for Add button click
        $('#addButton').click(function() {
            $('#formData')[0].reset();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();

            openAddEditModal('Add New User', 'Add');
        });

        // Event listener for Edit button click
        $('#user').on('click', '.editButton', function() {
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            var userId = $(this).data('userid');
            // Add more logging here to check other variables or function calls
            openAddEditModal('Edit User', 'Update', userId);
        });

        $('#user').on('click', '.deleteButton', function() {
            var userId = $(this).data('userid');
            if (confirm("Are you sure to delete this user?")) {
                $.ajax({
                    type: 'DELETE',
                    url: '/delete_user/' + userId,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        fetchUserData(); // Update user list after deletion
                        var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

                        // Append the alert to the container
                        $('#successMessageContainer').html(alertHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#MainModel').on('hidden.bs.modal', function(e) {
            $('#formData')[0].reset(); // Reset the form when the modal is hidden
        });

        $('#saveChangesButton').click(function() {

            var data = $("#formData").serializeArray(); // Serialize form data as an array

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var url = $('#userId').val() ? '/edit_user/' + $('#userId').val() : '/add_user';

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {

                    $('#MainModel').modal('hide');
                    $('#formData')[0].reset();
                    fetchUserData();
                    var alertHtml = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${response.message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

                    // Append the alert to the container
                    $('#successMessageContainer').html(alertHtml);
                },
                error: function(xhr, status, error) {
                    // Handle validation errors
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        // Display error messages for each field
                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }

            });
        });

        // Function to fetch user data
        function fetchUserData() {
            $.get('/get_data', function(data) {
                $('#user').empty();
                $.each(data, function(index, user) {
                    if (user.status != STATUS_DELETED) {
                        $('#user').append(
                            '<tr>' +
                            '<td>' + user.id + '</td>' +
                            '<td>' + user.username + '</td>' +
                            '<td>' + user.full_name + '</td>' +
                            '<td>' + user.role_name + '</td>' +
                            '<td>' + user.registered_on + '</td>' +
                            '<td class="status">' +
                            '<span class="badge ' + (user.status == 1 ? 'badge-success' : 'badge-danger') + '">' + (user.status == 1 ? 'Active' : 'Inactive') + '</span>' +
                            '</td>' +
                            '<td class="text-right">' +
                            '<i class="fa fa-edit text-success fa-md editButton" data-userid="' + user.id + '"></i>' + ' ' +
                            '<i class="fa fa-trash text-danger fa-md deleteButton" data-userid="' + user.id + '"></i></a>' +
                            '</td>' +
                            '</tr>'

                        );
                    }

                });
            });
        }


        fetchUserData();

        // Event listener for status toggling
        $(document).on('click', '.status', function() {
            var userId = $(this).closest('tr').find('.editButton').data('userid');
            var currentStatus = $(this).find('.badge').text().trim();
            var newStatus = currentStatus == 1 ? 1 : 0;

            // Send AJAX request to toggle user status
            $.ajax({
                type: 'POST',
                url: '/toggle_status',
                data: {
                    userId: userId,
                    status: newStatus,
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token in data
                },
                success: function(response) {
                    if (response.success) {
                        fetchUserData();
                        $('#user tbody').empty();
                    } else {
                        console.error('Failed to toggle user status.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });


    });
</script>
<script>
    $(window).on('load', function() {
        $('.modal.fade').appendTo('body');
    });
</script>

</body>

</html>