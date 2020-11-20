$(document).ready(function() {
    $('.append_input').on('click', function(event) {
        event.preventDefault();

        var input_elements = `
                            <div class="form-group">
                                <label for="">Select Rooms</label>
                                <input type="number" name="rooms[]" placeholder="no of rooms" class="form-control">
                            </div>
                             `


        $("#type_clone").clone().appendTo('.append-type');
        $(".append-room").append(input_elements);

    });



    // console.log(input_elements);

});