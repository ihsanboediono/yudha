<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Naive Analistic</h4>
            <form class="forms-sample" method="POST" action="">
                <div class="form-group row">
                    <label for="dataset" class="col-sm-3 col-form-label">Dataset</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control custom-file-input" id="validatedCustomFile" name="dataset" required>
                        <label class="form-control custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <?= form_error('dataset', '<small class="text-danger">', '</small>'); ?>
                        <!-- <input type="text" name="dataset" class="form-control" id="dataset" placeholder="dataset..."> -->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="min_supp" class="col-sm-3 col-form-label">Min.Supp</label>
                    <div class="col-sm-9">
                        <input type="text" name="min_supp" class="form-control" id="min_supp" placeholder="Min.Supp" value="<?= set_value('min_supp'); ?>">
                        <?= form_error('min_supp', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="itemset" class="col-sm-3 col-form-label">Sensitive Itemsets</label>
                    <div class="col-sm-9">
                        <textarea name="itemset" id="itemset" class="form-control" rows="6" placeholder="Sensitive Itemsets"></textarea>
                        <?= form_error('itemset', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="results" class="col-sm-3 col-form-label">Results</label>
                    <div class="col-sm-9">
                        <textarea name="results" id="results" class="form-control" rows="20" placeholder="Results"></textarea>
                        <?= form_error('results', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('barang') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>