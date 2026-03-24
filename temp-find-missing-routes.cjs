const fs = require('fs');
const path = require('path');
let files = [];
const walk = dir => {
  for (const ent of fs.readdirSync(dir, {withFileTypes: true})) {
    const p = path.join(dir, ent.name);
    if (ent.isDirectory()) walk(p);
    else if (p.endsWith('.blade.php')) files.push(p);
  }
};
walk('resources/views');
const target = ['caisse.select.post','login','password.email','password.update','register','vente.menu.store','vente.show'];
const result = [];
for (const f of files) {
  const c = fs.readFileSync(f, 'utf8');
  for (const t of target) {
    if (c.includes(t)) {
      result.push(`${t}: ${f}`);
    }
  }
}
fs.writeFileSync('temp-find-missing-routes.txt', result.join('\n'), 'utf8');
console.log('done');
