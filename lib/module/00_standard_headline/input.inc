<div class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Überschrift:</label>
        <div class="col-sm-8">
            <input class="form-control" type="text" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]" />
        </div>
        <div class="col-sm-2">
            <select class="form-control selectpicker" name="REX_INPUT_VALUE[1]" >
            <?php
            foreach (array("h1","h2","h3","h4","h5","h6") as $value) {
              echo '<option value="'.$value.'" ';
              
              if ( "REX_VALUE[1]"=="$value" ) {
                echo 'selected="selected" ';
              }
              echo '>'.$value.'</option>';
            }
            ?>
            </select>
        </div>
    </div>
</div>

