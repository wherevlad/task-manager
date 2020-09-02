</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
</script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<!-- Datatables  -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            pageLength: 3,
            bLengthChange: false,
            searching: false
        });
    } );

    function sendEditTask(task) {
        try {
            console.log(task.status);
            $('#editTaskId').val(task.id);
            $('#editTaskName').val(task.name);
            $('#editTaskEmail').val(task.email);
            $('#editTaskDescription').val(task.description);

            if (task.status == 1)
                $('#editTaskStatus').prop('checked', true).val(1)
            else
                $('#editTaskStatus').prop('checked', false).val(0)
            //$('#editTaskStatus').val(task.status);
        } catch (e) {
            console.log(e);
        }
    }
</script>
</body>
</html>