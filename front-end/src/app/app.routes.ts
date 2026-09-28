import { Routes } from '@angular/router';
import { ClientComponent } from './components/client/client.component';
import { AccountComponent } from './components/account/account.component';
import { PaymentComponent } from './components/payment/payment.component';
import { EmployeeComponent } from './components/employee/employee.component';
import { DailyExpenseComponent } from './components/daily-expense/daily-expense.component';
import { ErrorPageComponent } from './components/error-page/error-page.component';
import { CompanyExpensesComponent } from './components/company-expenses/company-expenses.component';
import { ReportsComponent } from './components/reports/reports.component';
import { SigninComponent } from './components/signin/signin.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { HomepageComponent } from './components/homepage/homepage.component';
import { CreatesComponent } from './components/creates/creates.component';
import { CreateAccountComponent } from './components/create-account/create-account.component';
import { CreateCompgianComponent } from './components/create-compgian/create-compgian.component';
import { AccountDetailsComponent } from './components/account-details/account-details.component';
import { PaymentAllComponent } from './components/psyments/payment-all/payment-all.component';
import { PaymentBasicComponent } from './components/psyments/payment-basic/payment-basic.component';
import { PaymentAdsComponent } from './components/psyments/payment-ads/payment-ads.component';
import { PaymentServiceComponent } from './components/psyments/payment-service/payment-service.component';
import { PaymentManagementComponent } from './components/psyments/payment-management/payment-management.component';

export const routes: Routes = [
  { path: '', component: SigninComponent }, // Default route
  { path: 'home', component: HomepageComponent },
  { path: 'sign-in', component: SigninComponent },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'clients', component: ClientComponent },
  { path: 'reports', component: ReportsComponent },
  {
    path: 'payments',
    component: PaymentComponent,
    children: [
      { path: '', component: PaymentAllComponent },
      { path: 'all-payment', component: PaymentAllComponent },
      {
        path: 'basic-payment',
        component: PaymentBasicComponent,
        children: [
          { path: 'basic-ads', component: PaymentAdsComponent },
          { path: 'basic-services', component: PaymentServiceComponent },
          { path: 'basic-management', component: PaymentManagementComponent },
        ],
      },
    ],
  },
  { path: 'daily-expenses', component: DailyExpenseComponent },
  { path: 'ad-account', component: AccountComponent },
  { path: 'company-expenses', component: CompanyExpensesComponent },
  { path: 'employee', component: EmployeeComponent },
  { path: 'create-client', component: CreatesComponent },
  { path: 'create-account', component: CreateAccountComponent },
  { path: 'account-details/:id', component: AccountDetailsComponent },
  { path: 'create-compgain/:id', component: CreateCompgianComponent },
  { path: '**', component: ErrorPageComponent }, // Catch-all route
];
