use vwpedia;
db.createUser({
  user: "admin",
  pwd: "secret",
  roles: [{ role: "readWrite", db: "vwpedia" }]
});
db.models.insertMany([
  { name: "Golf", description: "Компактен модел от VW." },
  { name: "Passat", description: "Бизнес клас автомобил от VW." }
]);