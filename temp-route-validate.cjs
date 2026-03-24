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

const routeJsonRaw = execSync('php artisan route:list --json', { encoding: 'utf8' }).replace(/^\uFEFF/, '');
const routeJson = JSON.parse(routeJsonRaw);
const defined = new Set(routeJson.map(r => r.name).filter(Boolean));

const missing = [...routes].filter(r => !defined.has(r)).sort();
const extra = [...defined].filter(r => !routes.has(r)).sort();

const output = [
  'routes_in_blade: ' + routes.size,
  'routes_defined: ' + defined.size,
  '',
  'missing in routes:',
  ...missing,
  '',
  'extra routes not used in blades:',
  ...extra,
].join('\n');

fs.writeFileSync('temp-route-check-output.txt', output, 'utf8');
console.log(output);
