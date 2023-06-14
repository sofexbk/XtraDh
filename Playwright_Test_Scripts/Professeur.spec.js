import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost:8080/');
  await page.getByPlaceholder('Entrer l\'e-mail').fill('aminetaha1964@gmail.com');
  await page.getByPlaceholder('Entrer l\'e-mail').press('Tab');
  await page.getByPlaceholder('Entrer le mot de passe').fill('test');
  await page.getByPlaceholder('Entrer le mot de passe').press('Enter');
  await page.getByText('Prof', { exact: true }).click();
  await page.getByText('aminetaha1964@gmail.com').click();
  await page.getByRole('img', { name: 'Neil image' }).click();
  await page.locator('div').filter({ hasText: /^Professeur$/ }).first().click();
  await page.locator('#app div').filter({ hasText: 'Nom:Prénom:Email:PPR:Établissement: Modifier' }).nth(3).click();
  await page.locator('#app div').filter({ hasText: 'Nom:Prénom:Email:PPR:Établissement: Modifier' }).nth(4).click();
  await page.locator('form div').filter({ hasText: 'Modifier' }).first().click();
  await page.getByRole('button', { name: 'Modifier' }).click();
  await page.getByText('×Nom:Prénom:Email:Mot de passe: Modifier Annuler').click();
  await page.locator('.mb-4 > .border').first().click();
  await page.locator('.mb-4 > .border').first().fill('Amine');
  await page.getByRole('button', { name: 'Modifier' }).nth(1).click();
  await page.locator('.mb-4 > .border').first().click();
  await page.getByRole('button', { name: 'Annuler' }).click();
  const screenshot = await page.screenshot();

  // Compare the screenshot with the reference snapshot
  expect(screenshot).toMatchSnapshot();
  await page.getByRole('link', { name: 'Interventions' }).click();
  await page.getByText('Consultation des interventionsFiltrer par année :Toutes les années2022/20232023/').click();
  await page.getByRole('heading', { name: 'Consultation des interventions' }).click();
  await page.getByText('Filtrer par année :Toutes les années2022/20232023/2024Filtrer par semestre :Tous').click();
  await page.getByRole('cell', { name: 'Intitule_intervention' }).click();
  await page.getByRole('cell', { name: 'Etablissement' }).click();
  await page.getByRole('cell', { name: 'Annee_univ' }).click();
  await page.getByRole('cell', { name: 'Semestre', exact: true }).click();
  await page.getByRole('cell', { name: 'Date_debut' }).click();
  await page.getByRole('cell', { name: 'Date_fin' }).click();
  await page.getByRole('cell', { name: 'Nbr_heures' }).click();
  await page.getByRole('link', { name: 'Paiement' }).click();
  await page.getByRole('heading', { name: 'Consulter vote procédure de paiement d\'année en cours' }).click();
  await page.locator('div').filter({ hasText: /^Anciennes fiches de paie$/ }).click();
  await page.getByRole('cell', { name: 'Etablissement' }).click();
  await page.getByRole('cell', { name: 'Volume Horraire' }).click();
  await page.getByRole('cell', { name: 'Taux_Horraire' }).click();
  await page.getByRole('cell', { name: 'Salaire Brut' }).click();
  await page.getByRole('cell', { name: 'Import sur revenu' }).click();
  await page.getByRole('cell', { name: 'Salaire Net' }).click();
  await page.getByRole('cell', { name: 'Annee_univirsitaire' }).click();
  await page.getByRole('cell', { name: 'Semestre' }).click();
  await page.getByRole('button', { name: 'Anciennes fiches de paie' }).click();
  await page.getByRole('heading', { name: 'Télécharger votre fiches de paie' }).click();
  await page.getByRole('columnheader', { name: 'Année universitaire' }).click();
  await page.getByRole('columnheader', { name: 'Etat' }).click();
  await page.getByRole('columnheader', { name: 'Fiche' }).click();
  await page.getByRole('rowheader', { name: '2022-2023' }).click();
  await page.getByRole('cell', { name: 'Payée' }).click();
  await page.getByRole('cell', { name: 'Télécharger' }).click();
  await page.getByText('Déconnexion').click();
});