<?php
class TugasItem {
    public $path;
    public $name;
    public $title;
    public $dateOfWork;
    public function __construct($path, $name, $title, $dateOfWork) {
        $this->path = $path;
        $this->name = $name;
        $this->title = $title;
        $this->dateOfWork = $dateOfWork;
    }
    public function printAsListGroupItem() {
        ?>
        <a href="<?=$this->path?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0"><?=$this->name?></h6>
                    <p class="mb-0 opacity-75"><?=$this->title?></p>
                </div>
                <small class="opacity-50 text-nowrap"><?=$this->dateOfWork?></small>
            </div>
        </a>
        <?php
    }
    public static function printTugasListAsListGroup($tugasList) {
        ?>
        <div class="list-group w-auto">
            <?php
            foreach ($tugasList as $tugas) {
                $tugas->printAsListGroupItem();
            }
            ?>
        </div>
        <?php
    }
}
?>