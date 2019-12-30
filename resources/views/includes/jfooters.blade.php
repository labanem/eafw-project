<script>
$(document).ready(function() {
    $('input:radio[name=triptype]').click(function() {
        var checkval = $(this).val();
        $('#timein').prop('disabled', !(checkval == 'returntrip'));
        $('#mileagein').prop('disabled', !(checkval == 'returntrip'));
        $('#datein').prop('disabled', !(checkval == 'returntrip'));
    });
});

function deleteFunction() {
	if(!confirm("Are You Sure to Delete?"))
	event.preventDefault();
 }
</script>