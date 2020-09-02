<form method="post">
    <div class="form-group row">
        <div>
            <label for="validationServerUsername">First name</label>
            <input type="text" class="form-control" name="validationServerUsername" required>
        </div>

        <div class="col-md-4 mb-3">
            <label for="validationServerEmail">Email</label>
            <input type="email" class="form-control" name="validationServerEmail" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label for="validationServerTaskDescription">Task Description</label>
            <!--- textarea -->
            <input type="text" class="form-control" name="validationServerTaskDescription" required></input>
        </div>
    </div>

    <button class="btn btn-primary" type="submit" name="validationServerAddTaskButton">Submit form</button>
</form>