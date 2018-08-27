<?php
/**
 * TODO: Export for SEC XBLR
 */
/**
 * <!-- Field: Doc-Info; Name: Generator; Value: GoFiler Complete; Version: 4.23b -->
 * <!-- Field: Doc-Info; Name: VendorURI; Value: http://www.novaworks.co -->
 * <!-- Field: Doc-Info; Name: Source; Value: PETV %2D 20180630 10Q Q1 DFN.xfr; Date: 2018%2D08%2D24T19:46:15Z -->
 * <!-- Field: Doc-Info; Name: Status; Value: 0x00000000 -->
 */

 function exportHeader($symbol, $date, $form_type, $quarter, $xblr, $timestamp) {
     global $VERSION;

     $output = <<<TEXT
<!-- Field: Doc-Info; Name: Generator; Value: BestBooks Complete; Version: $VERSION -->
<!-- Field: Doc-Info; Name: VendorURI; Value: https://bestbooks.phkcorp.com -->
<!-- Field: Doc-Info; Name: Source; Value: $symbol %2D $date $form_type Q$quarter $xblr; Date: $timestamp -->
<!-- Field: Doc-Info; Name: Status; Value: 0x00000000 -->
TEXT;
    return $output;
 }
?>