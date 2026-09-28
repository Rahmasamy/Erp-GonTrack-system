import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { ParentAppComponent } from './components/parent-app/parent-app.component';
import { SigninComponent } from './components/signin/signin.component';
import { ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    DashboardComponent,
    ParentAppComponent,
    SigninComponent,
    ReactiveFormsModule,
    HttpClientModule,
    RouterOutlet,
  ],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  title = 'front-end';
  login = true;
}
