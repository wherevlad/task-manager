<br><br><br>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="th-sm">#</th>
        <th class="th-sm">Name</th>
        <th class="th-sm">Email</th>
        <th class="th-sm">Description</th>
        <th class="th-sm">Status</th>
        <?php if ($adminController->checkAdminSession()) { ?>
            <th class="th-sm">Action</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($listTask as $task) {
        //$status = ($task['status'] == 0) ? 'performed' : 'unperformed';
        $status = ($task['status'] == 0) ? '🌝' : '🌚';
        $content = "
            <tr>
                <th scope='row'>" . $task['id'] . "</th>
                <td>" . $task['name'] . "</td>
                <td>" . $task['email'] . "</td>
                <td>" . $task['description'] . "</td>
                <td>" . $status . "</td>";


        if ($adminController->checkAdminSession()) {
            $content .= "
                <td>
                    <button type='button' onclick='sendEditTask(" . json_encode($task) . ")' class='btn btn-primary' data-toggle='modal' data-target='#editTaskModal'>
                        Edit
                    </button>
                </td>";
        }

        echo $content . "</tr>";;
    }
    ?>

    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" class="row">
                <div class="form-group">
                    <label for="validationFormUpdateTaskName">Name</label>
                    <input type="text"
                           class="form-control"
                           id="editTaskName"
                           name="validationFormUpdateTaskName"
                           required>
                </div>

                <div class="form-group">
                    <label for="validationFormUpdateTaskEmail">Email</label>
                    <input type="email"
                           id="editTaskEmail"
                           class="form-control"
                           name="validationFormUpdateTaskEmail"
                           required>
                </div>

                <div class="form-group">
                    <label for="validationFormUpdateTaskDescription">Description</label>
                    <input type="text"
                           id="editTaskDescription"
                           class="form-control"
                           name="validationFormUpdateTaskDescription"
                           required>
                </div>

                <div class="form-group">
                    <label for="validationFormUpdateTaskStatus">Status</label>
                    <input type="checkbox"
                           id="editTaskStatus"
                           name="validationFormUpdateTaskStatus">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"
                        class="btn btn-primary"
                        id="editTaskId"
                        name="validationFormUpdateTaskButton">
                    Edit Task
                </button>
            </div>
        </form>
    </div>
</div>
