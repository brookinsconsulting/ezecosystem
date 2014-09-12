<?php

class eZecosystemSimpleOperators extends OWSimpleOperator
{
  /**
   * Multi-byte chr(): Will turn a numeric argument into a UTF-8 string.
   * 
   * @param mixed $num
   * @return string
   */
  function chr_utf8($num)
  {
    if ($num < 128) return chr($num);
    if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
    if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    return '';
  }

  /** 
   * Callback helper 
   */
  function chr_utf8_callback($matches)
  { 
    return $this->chr_utf8(hexdec($matches[1])); 
  }

  /**
   * Decodes all HTML entities, including numeric and hexadecimal ones.
   * 
   * @param mixed $string
   * @return string decoded HTML
   */
  function html_entity_decode_numeric($string, $quote_style = ENT_COMPAT, $charset = null )
  {
    if( $charset == null )
      $charset = 'ISO-8859-1'; //ini_get("default_charset");

    $string = html_entity_decode($string, $quote_style, $charset);
    $string = preg_replace_callback('~&#x([0-9a-fA-F]+);~i', $this->chr_utf8_callback("\\1"), $string);
    $string = preg_replace('~&#([0-9]+);~e', '$this->chr_utf8("\\1")', $string);
    return $string; 
  }

  /*!
   * Quick and dirty way to get the issue number from a git repository commit message atom feed
   */
  function getIssueFromGitCommitMessage( $data )
  {
    //given string $data, will return the first $issue string in that string
    $ret = false;
    $limit = 5;

    // test title first
    $splitTitle = preg_split( "/EZP-/", $data['title'] );

    if( isset( $splitTitle[1] ) )
      $splitTitleTestForZero = preg_split( "/0/", $splitTitle[1] );
        else
          $splitTitleTestForZero = null;

    if( $splitTitleTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }

    // test message second
    $splitMessage = preg_split( "/EZP-/", $data['content'] );

    // eZDebug::writeDebug( "wrap_operator: getIssueFromPubSVNCommitMessage, results: " . print_r( $splitMessage, TRUE) );

    if( isset( $splitMessage[1] ) )
      $splitMessageTestForZero = preg_split( "/0/", $splitMessage[1] );
        else
          $splitMessageTestForZero = null;

    if( $splitMessageTestForZero[0] == 0 ) { $limit = 6; } else { $limit = 5; }

    if( isset( $splitTitle[1] ) ) {
      $match = $splitTitle[1];
      $issue = substr( $match, 0, +$limit );

      if ( $issue != '' && count( $issue ) <= 5 && is_numeric( $issue ) ) {
        // eZDebug::writeDebug( "wrap_operator: getIssueFromPubSVNCommitMessage, results: " . print_r( $issue, TRUE) );
        $ret = $issue;
      }
    }
    elseif( isset( $splitMessage[1] ) ) {
      $match = $splitMessage[1];
      $issue = substr( $match, 0, +$limit );

      if ( $issue != '' && count( $issue ) <= 5 && is_numeric( $issue ) ) {
        // eZDebug::writeDebug( "wrap_operator: getIssueFromPubSVNCommitMessage, results: " . print_r( $issue, TRUE) );
        $ret = $issue;
      }
    }

    return $ret;
  }

}

?>