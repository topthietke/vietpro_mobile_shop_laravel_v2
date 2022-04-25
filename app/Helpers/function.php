function showErrors($errors, $input) {
        if ($errors->has($input)){
            return '<div class="alert alert-danger">' . $errors->first($input) . '</div>';
        }
    }
