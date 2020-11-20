$(document).ready(function() {
    $('body').on('change', '#property', function() {

        // $('.time_in').show();


        var id = $(this).find(":selected").attr("data-id");
        // console.log(id);
        $.ajax({
            url: 'transaction/' + id,
            method: 'GET',
            type: 'json',
            success: function(data) {
                var trHTML = '';

                // var service_name;
                var serviceHTML = '<select class="form-control" name="services[]"><option selected disabled>Select Service</option>'
                $.each(data.services, function(j, service) {
                    serviceHTML += '<option value=' + service.id + '>' + service.service_name + '</option>'

                });

                //  gra;
                var graHTML = '<select class="form-control" name="attendants[]"><option selected disabled>Select Service</option>'
                $.each(data.attendants, function(j, attendant) {
                    graHTML += '<option value=' + attendant.id + '>' + attendant.first_name + '</option>'

                });
                graHTML += '</select>';
                $.each(data.html, function(i, rooms) {
                    // console.log(data);
                    var roomID = " <input name='room_id[]' type='hidden' value=" + rooms.id + ">";
                    var roomName = " <input name='room_name[]' type='hidden' value=" + rooms.room_name + ">";
                    var typeID = " <input name='room_type_id[]' type='hidden' value=" + rooms.room_type_id + ">";
                    var propID = " <input name='property_id[]' type='hidden' value=" + rooms.property_id + ">";
                    var user_id = " <input name='user_id[]' type='hidden' value=" + rooms.user_id + ">";


                    var status = '<select class="form-control" name="status[]">\
                            <option value="0" disabled selected>Select Status</option>\
                            <option value="1">Dirty</option>\
                            <option value="2">Clean</option>\
                            <option value="3">Inspected</option>\
                             </select>'


                    var time_in =
                        '<input type="datetime-local" class="form-control" name="time_in[]" autocomplete="off">'


                    var time_out =
                        ' <input type="datetime-local" class="form-control" name="time_out[]" autocomplete="off"\
                                required >'


                    trHTML = '<tr>\
                     <td>' + rooms.id + roomID + '</td>\
                      <td>' + rooms.room_name + roomName + '</td>\
                       <td>' + rooms.room_type.room_type + typeID + '</td>  <td>' + rooms.property.name + '' + propID + '' + user_id + ' </td>\
                        < td > ' + serviceHTML + '</ > \
                       <td>' + status + '</td>\
                       <td>' + graHTML + '</td>  \
                       <td>' + time_in + '</td>  \
                       <td>' + time_out + '</td>  \
                            /tr>';

                    $('#results').append(trHTML);
                });
            }





        });

    });
});