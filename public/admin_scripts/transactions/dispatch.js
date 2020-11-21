$(document).ready(function() {
    $('body').on('change', '#property', function() {

        // $('.time_in').show();

        var date = $('#property').val();
        // console.log(date);
        var id = $('#props').find(":selected").attr("data-id");
        // console.log(id);
        $.ajax({
            url: 'dispatchs/' + id,
            method: 'GET',
            type: 'json',
            data: {
                data: date,
            },
            success: function(data) {

                var trHTML = '';

                var building_id = $('#props').find(':selected').attr('data-building-id');
                var brand_id = $('#props').find(':selected').attr('data-brand-id');
                // console.log(building_id);
                // var service_name;
                // service HTML
                var serviceHTML = '<select class="text-secondary" name="service_id[]"><option selected disabled>Select Service</option>'
                $.each(data.services, function(j, service) {
                    serviceHTML += '<option value=' + service.id + '>' + service.service_name + '</option>'

                });
                serviceHTML += '</select>';
                // end of services


                //  rooms HTML
                var room_type_id;
                var roomsHTML = '<select class="text-secondary js-example-basic-single" name="room_id[]" ><option selected disabled>Select rooms</option>'
                $.each(data.rooms, function(j, rum) {
                    roomsHTML += '<option value=' + rum.id + '>' + rum.room_name + '</option>'
                    room_type_id = rum.room_type_id;
                });
                roomsHTML += '</select>';
                // end of rooms


                //  gra HTML
                var graHTML = '<select class="text-secondary" name="attendant_id[]"><option selected disabled>Select gra</option>'
                $.each(data.attendants, function(j, attendant) {
                    graHTML += '<option value=' + attendant.id + '>' + attendant.first_name + '</option>'

                });
                graHTML += '</select>';
                // end of gra HTML

                //  gra HTML
                var gratwoHTML = '<select class="text-secondary" name="attendant_two_id[]"><option selected disabled>Select gra</option>'
                $.each(data.attendants, function(j, attendant) {
                    gratwoHTML += '<option value=' + attendant.id + '>' + attendant.first_name + '</option>'

                });
                gratwoHTML += '</select>';
                // end of gra HTML




                //  supervisor HTML
                var supervisors = '<select class="text-secondary" name="supervisor_id[]"><option selected disabled>Select supervisor</option>'
                $.each(data.supervisors, function(j, supervisor) {
                    supervisors += '<option value=' + supervisor.id + '>' + supervisor.supervisor_name + '</option>'
                });
                supervisors += '</select>';
                // end of supervisor HTML


                //  houseman HTML
                var housemans = '<select class="text-secondary" name="houseman_id[]"><option selected disabled>Select houseman</option>'
                $.each(data.housemans, function(j, houseman) {
                    housemans += '<option value=' + houseman.id + '>' + houseman.houseman_name + '</option>'

                });
                housemans += '</select>';
                // end of houseman HTML

                var status = '<select class="text-secondary" name="status[]">\
                            <option value="0" disabled selected>Select Status</option>\
                            <option value="1">V</option>\
                            <option value="2">VC</option>\
                            <option value="3">VCI</option>\
                            <option value="3">ROLLOVER</option>\
                             </select>'

                var roomHTML = '<select class="text-secondary" name="add_room[]">\
                            <option value="0" disabled selected>Select Add Room</option>\
                            <option value="1">EARLY OUT</option>\
                            <option value="2">ROLLOVER</option>\
                            <option value="3">ROOM MOVE</option>\
                            <option value="3">CARPET CLEAN</option>\
                             </select>'

                // for dispatch if it already exist update it
                if (data.dispatchs != 0) {

                    $.each(data.dispatchs, function(j, dispatch) {

                        //

                        // service HTML
                        var serviceHTML = '<select class="text-secondary" name="service_id[]"><option disabled>select Service</option>'
                        $.each(data.services, function(j, service) {
                            // var serviceHTML = '';
                            if (service.id == dispatch.service_id) {
                                serviceHTML += '<option value=' + service.id + '   selected>' + service.service_name + '</option>'

                            }
                            serviceHTML += '<option value=' + service.id + '   >' + service.service_name + '</option>'
                        });
                        serviceHTML += '</select>'


                        //  rooms HTML
                        var room_type_id;
                        var roomsHTML = '<select class="text-secondary js-example-basic-single" name="room_id[]" ><option selected disabled>Select rooms</option>'
                        $.each(data.rooms, function(j, rum) {

                            if (rum.id == dispatch.room_id) {
                                roomsHTML += '<option value=' + rum.id + '   selected>' + rum.room_name + '</option>'
                                room_type_id = dispatch.room_type_id;
                            }
                            roomsHTML += '<option value=' + rum.id + '>' + rum.room_name + '</option>'

                        });
                        roomsHTML += '</select>';
                        // end of rooms


                        //  gra HTML
                        var graHTML = '<select class="text-secondary" name="attendant_id[]"><option  disabled>Select gra</option>'
                        $.each(data.attendants, function(j, attendant) {

                            if (attendant.id == dispatch.attendant_id) {
                                graHTML += '<option value=' + attendant.id + '   selected>' + attendant.first_name + '</option>'

                            }
                            graHTML += '<option value=' + attendant.id + '>' + attendant.first_name + '</option>'

                        });
                        graHTML += '</select>';
                        // end of gra HTML


                        //  gra HTML
                        var gratwoHTML = '<select class="text-secondary" name="attendant_two_id[]"><option  disabled>Select gra two</option>'
                        $.each(data.attendants, function(j, attendant) {

                            if (attendant.id == dispatch.attendant_id_two) {
                                gratwoHTML += '<option value=' + attendant.id + '   selected>' + attendant.first_name + '</option>'
                                    // alert(dispatch.service_id);
                            }
                            gratwoHTML += '<option value=' + attendant.id + '>' + attendant.first_name + '</option>'

                        });
                        gratwoHTML += '</select>';
                        // end of gra HTML


                        var supervisors = '<select class="text-secondary" name="supervisor_id[]"><option  disabled>Select supervisor</option>'
                        $.each(data.supervisors, function(j, supervisor) {

                            if (supervisor.id == dispatch.supervisor_id) {
                                supervisors += '<option value=' + supervisor.id + '   selected>' + supervisor.supervisor_name + '</option>'

                            }
                            supervisors += '<option value=' + supervisor.id + '>' + supervisor.supervisor_name + '</option>'
                        });
                        supervisors += '</select>';
                        // end of supervisor HTML


                        //  houseman HTML
                        var housemans = '<select class="text-secondary" name="houseman_id[]"><option  disabled>Select houseman</option>'
                        $.each(data.housemans, function(j, houseman) {
                            if (houseman.id == dispatch.houseman_id) {
                                housemans += '<option value=' + houseman.id + '   selected>' + houseman.houseman_name + '</option>'

                            }
                            housemans += '<option value=' + houseman.id + '>' + houseman.houseman_name + '</option>'

                        });
                        housemans += '</select>';
                        // end of houseman HTML

                        var status = '<select class="text-secondary" name="status[]">\
                            <option value="0" disabled >Select Status</option>\
                            <option value="1" ' + (dispatch.status == 1 ? 'selected' : '') + '>V</option>\
                            <option value="2"  ' + (dispatch.status == 2 ? 'selected' : '') + '>VC</option>\
                            <option value="3"  ' + (dispatch.status == 3 ? 'selected' : '') + '>VCI</option>\
                            <option value="3"  ' + (dispatch.status == 4 ? 'selected' : '') + '>ROLLOVER</option>\
                             </select>'

                        var roomHTML = '<select class="text-secondary" name="add_room[]">\
                            <option value="0" disabled selected>Select Add Room</option>\
                            <option value="1" ' + (dispatch.add_room == 1 ? 'selected' : '') + '>EARLY OUT</option>\
                            <option value="2" ' + (dispatch.add_room == 2 ? 'selected' : '') + '>ROLLOVER</option>\
                            <option value="3" ' + (dispatch.add_room == 3 ? 'selected' : '') + '>ROOM MOVE</option>\
                            <option value="3" ' + (dispatch.add_room == 4 ? 'selected' : '') + '>CARPET CLEAN</option>\
                             </select>'


                        var time_in = '<input type="text" name="time_in[]" class="" readonly value="' + dispatch.time_in + '" id="time_in">';
                        var time_out = '<input type="text" name="time_out[]" class="btn btn-sm btn-primary" value="' + (dispatch.time_out == 0 ? "0" : dispatch.time_out) + '" id="time_out">'


                        trHTML = '<tr>\
                    <input type="hidden" value=' + dispatch.brand_id + ' name="brand_id[]">\
                         <td>' + '<input type="hidden" value="' + dispatch.property_building_id + ' " name="porperty_building_id[]" />' + '</td>\
                     <td>' + '<input type="hidden" value="' + dispatch.room_type_id + ' " name="room_type_id[]" />' + '</td>' + '</td>\
                    <td>' + roomsHTML + '</td> \
                     <td>' + serviceHTML + '</td> \
                     <td>' + status + '</td>\
                     <td>' + graHTML + '</td>  \
                     <td>' + gratwoHTML + '</td>  \
                     <td>' + time_in + '</td>\
                     <td>' + time_out + '</td>\
                      <td>' + roomHTML + '</td>\
                     <td>' + '<input type="text" placeholder="comment " name="comments[]" value="' + dispatch.comments + ' " />' + '</td>\
                        <td>' + supervisors + '</td>\
                        <td>' + housemans + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                    tr > ';

                        $('#results').append(trHTML);




                    });

                }



                //  <td>' + '<input type="hidden" value="' + 1 + ' " name="room_type_id[]" />' + '</td>' + '</td>\
                if (data.dispatchs == 0) {
                    // console.log('false');
                    trHTML = '<tr id="dispatch_create">\
                        <input type="hidden" name="room_type_id" value="' + room_type_id + '">\
                    <input type="hidden" value="' + brand_id + '" name="brand_id[]">\
                         <td>' + '<input type="hidden" value="' + building_id + ' " name="porperty_building_id[]" />' + '</td>\
                     <td>' + '<input type="hidden" value="' + room_type_id + ' " name="room_type_id[]" />' + '</td>' + '</td>\
                    <td>' + roomsHTML + '</td> \
                     <td>' + serviceHTML + '</td> \
                     <td>' + status + '</td>\
                     <td>' + graHTML + '</td>  \
                     <td>' + gratwoHTML + '</td>  \
                     <td>' + '<input type="time" name="time_in[]" class="btn btn-sm btn-primary time_in"  id="">' + '</td>\
                     <td>' + '<input type="time" name="time_out[]" class="btn btn-sm btn-primary time_out" >' + '</td>\
                     <td>' + roomHTML + '</td>  \
                     <td>' + '<input type="text" placeholder="comment " name="comments[]" />' + '</td>\
                        <td>' + supervisors + '</td>\
                        <td>' + housemans + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<a href="" class="add_row"><i class="fa fa-plus fa-2x"></a>' + '</td>\
                    tr > ';

                    $('#results').append(trHTML);

                    $(document).on('click', '.add_row', function(event) {
                        var newHTML = '<tr id="dispatch_create">\
                        <input type="hidden" name="room_type_id" value="' + room_type_id + '">\
                    <input type="hidden" value="' + brand_id + '" name="brand_id[]">\
                         <td>' + '<input type="hidden" value="' + building_id + ' " name="porperty_building_id[]" />' + '</td>\
                     <td>' + '<input type="hidden" value="' + room_type_id + ' " name="room_type_id[]" />' + '</td>' + '</td>\
                    <td>' + roomsHTML + '</td> \
                     <td>' + serviceHTML + '</td> \
                     <td>' + status + '</td>\
                     <td>' + graHTML + '</td>  \
                     <td>' + gratwoHTML + '</td>  \
                     <td>' + '<input type="time" name="time_in[]" class="btn btn-sm btn-primary time_in"  id="">' + '</td>\
                     <td>' + '<input type="time" name="time_out[]" class="btn btn-sm btn-primary time_out"  id="">' + '</td>\
                     <td>' + roomHTML + '</td>  \
                     <td>' + '<input type="text" placeholder="comment " name="comments[]" />' + '</td>\
                        <td>' + supervisors + '</td>\
                        <td>' + housemans + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<p>pending</p>' + '</td>\
                        <td>' + '<a href="" class="add_row"><i class="fa fa-plus fa-2x"></a>' + '</td>\
                    tr > ';
                        event.preventDefault();
                        $(newHTML).appendTo('#results');
                        newHTML++;


                    });
                }


                $(document).on('click', '.time_in', function() {
                    var row = $(this).closest('tr');
                    var dt = new Date();
                    var time_in = dt.getHours() + ":" + dt.getMinutes();
                    $(row.find('.time_in')).val(time_in);
                    // $(".time_in").val(time_in);
                    $(this).removeClass('btn btn-sm btn-primary');
                    $(this).prop('readonly', true);

                });

                $(document).on('click', '.time_out', function() {
                    var row = $(this).closest('tr');
                    var dt = new Date();
                    var time_out = dt.getHours() + ":" + dt.getMinutes();
                    $(row.find('.time_out')).val(time_out);
                    $(this).removeClass('btn btn-sm btn-primary');
                    $(this).prop('readonly', true);
                    console.log('hello');

                });

                $('.js-example-basic-single').select2();
            }

        });

    });
});