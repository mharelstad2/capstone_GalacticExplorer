const express = require ('express');
const app = express ();
const port = 5163;

app.set ('view engine', 'ejs');
app.use (express.static ('public'));

app.get ('/', (req, res) => {
  res.render ('index');
});

app.get ('/stars', (req, res) => {
  res.render ('stars');
});

app.get ('/planets', (req, res) => {
  res.render ('planets');
});

app.get ('/login', (req, res) => {
  res.render ('../capstone_GalacticExplorer/login.php'); // Assuming login.php is your login view file
});

app.get ('/about', (req, res) => {
  res.render ('about');
});

app.listen (port, () => {
  console.log (`Server listening at http://localhost:${port}`);
});
