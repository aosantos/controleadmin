 
                      <div class="form-group">
                    <label class="control-label col-sm-2" for="contas">Tipo de Gasto:</label>
                    <div class="col-sm-8">
                     
            <?php $attributes = 'class="form-control" id="contas" name="contas"';
            echo form_dropdown('contas', mb_strtoupper($nome_contas), set_value('contas'), $attributes); ?>
            <span class="text-danger"><?php echo form_error('contas'); ?></span>
        </div>
                </div>