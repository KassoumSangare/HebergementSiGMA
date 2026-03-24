const fs = require('fs');
const path = require('path');
const execSync = require('child_process').execSync;

const walk = dir => {
  let res = [];
  for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
    const p = path.join(dir, entry.name);
    if (entry.isDirectory()) res = res.concat(walk(p));
    else if (p.endsWith('.blade.php')) res.push(p);
  }
  return res;
};

const routes = new Set();
for (const file of walk('resources/views')) {
  const c = fs.readFileSync(file, 'utf8');
  const re = /route\s*\(\s*['\"]([^'\"]+)['\"]/g;
  let m;
  while ((m = re.exec(c)) !== null) routes.add(m[1]);
}

const defined = new Set();
const routesList = execSync('php artisan route:list --name', { encoding: 'utf8' });
for (const line of routesList.split('\n')) {
  const t = line.trim().split(/\s+/);
  if (t.length && t[t.length - 1] !== 'Name') defined.add(t[t.length - 1]);
}

const missing = [...routes].filter(r => !defined.has(r)).sort();
const extra = [...defined].filter(r => !routes.has(r)).sort();

console.log('routes_in_blade: ' + routes.size);
console.log('routes_defined: ' + defined.size);
console.log('\nmissing in routes:');
console.log(missing.join('\n'));
console.log('\nextra routes not used in blades:');
console.log(extra.join('\n'));
