<form method="POST">
    <div class="panel">
        <div class="panel-heading">
            {l s='Configuration' mod='moduleFurTest'}
        </div>
        <div class="panel-body">
            <label for="print">{l s='What to print owo?' mod='moduleFurTest'}</label>
            <input type="text" name="print" class="form-control"/><br/>
            <span>
                <h5>
                    {$MODULEFURTEST_STR_OWO}
                </h5>
            </span>
            
        </div>
        <div class="panel-footer">
            <button type="submit" name="save-moduleFurTest" class="btn btn-default pull-right">
                <i class="process-icon-save"></i>
                {l s='Save' mod='moduleFurTest'}
            </button>
        </div>
    </div>
</form>