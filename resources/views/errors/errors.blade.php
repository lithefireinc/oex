<div class="login-error" v-show="errors.length">
    <ul class="alert-modified errors-list alert alert-danger">
        <li v-repeat="error: errors"><strong>Error</strong> - @{{ error }}</li>
    </ul>
</div>