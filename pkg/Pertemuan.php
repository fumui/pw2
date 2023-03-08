<?php
class Pertemuan {
    public $name;
    public $tugasList;
    public function __construct($name, $tugasList) {
        $this->name = $name;
        $this->tugasList = $tugasList;
    }
    public function printAsAccordionItem($accordionId,$id) {
        ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading".$id>
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#<?=$id?>" aria-expanded="false" aria-controls="<?=$id?>">
                    <?=$this->name?>
                </button>
            </h2>
            <div id="<?=$id?>" class="accordion-collapse collapse hide" aria-labelledby="heading".$id
                data-bs-parent="#<?=$accordionId?>">
                <div class="accordion-body">
                <?php
                    TugasItem::printTugasListAsListGroup($this->tugasList);
                ?>
                </div>
            </div>
        </div>
        <?php
    }
    public static function printPertemuanListAsAccordion($id, $pertemuanList) {
        ?>
        <div class="accordion" id="<?=$id?>">
            <?php
            for ($i = 0; $i < count($pertemuanList); $i++) {
                $pertemuanList[$i]->printAsAccordionItem($id, "PertemuanItem".$i);
            }
            ?>
        </div>
        <?php
    }
}
?>