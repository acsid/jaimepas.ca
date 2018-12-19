<?PHP

//function to get current code revision

function get_current_git_commit( $branch='master' ) {
  if ( $hash = file_get_contents( sprintf( '.git/refs/heads/%s', $branch ) ) ) {
    return $hash;
  } else {
    return false;
  }
}
?>
