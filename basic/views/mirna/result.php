<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/27
 * Time: 上午9:25
 */
use yii\helpers\Html;
?>
<?= Html::cssFile('@web/css/mirna/result.css') ?>

<div class="resultPage">
    <table class="table resultContent">
        <tr class="accessName">
            <td style="width: 120px" class="bg-success">Accession</td>
            <td>MI0002808</td>
        </tr>
        <tr class="mirID">
            <td class="bg-success">ID</td>
            <td>mml-mir-181a</td>
        </tr>
        <tr class="mirDesc">
            <td class="bg-success">Community annotation</td>
            <td>In molecular biology miR-181 microRNA precursor is a small non-coding RNA molecule. MicroRNAs (miRNAs) are transcribed as ~70 nucleotide precursors and subsequently processed by the RNase-III type enzyme Dicer to give a ~22 nucleotide mature product. In this case the mature sequence comes from the 5' arm of the precursor. They target and modulate protein expression by inhibiting translation and / or inducing degradation of target messenger RNAs. This new class of genes has recently been shown to play a central role in malignant transformation. miRNA are downregulated in many tumors and thus appear to function as tumor suppressor genes. The mature products miR-181a, miR-181b, miR-181c or miR-181d are thought to have regulatory roles at posttranscriptional level, through complementarity to target mRNAs. miR-181 which has been predicted or experimentally confirmed in a wide number of vertebrate species as rat, zebrafish, and in the pufferfish</td>
        </tr>
        <tr class="mirSeq">
            <td class="bg-success">Sequence</td>
            <td>AGAAGGGCUAUCAGGCCAGCCUUCAGAGGACUCCAAGGAACAUUCAACGCUGUCGGUGAGUUUGGGAUUUGAAAAAACCACUGACCGUUGACUGUACCUCGGGGUCCUUA</td>
        </tr>
        <tr class="mirPred">
            <td class="bg-success">Predicted Targets</td>
            <td>TargetScanVert:mml-miR-181a-5p</td>
        </tr>
        <tr class="mirHreb">
            <td class="bg-success">Herb</td>
            <td>Hong Jing Tian</td>
        </tr>
        <tr class="mirHuRna">
            <td class="bg-success">Targeted Human RNA</td>
            <td>1</td>
        </tr>
    </table>
</div>


