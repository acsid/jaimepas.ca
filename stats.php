<?PHP

echo 'stats: ';
print($database->count("sujet"));
echo ' choses pas aimer par ';
print($database->sum("sujet","vote"));
echo ' personnes';
?>