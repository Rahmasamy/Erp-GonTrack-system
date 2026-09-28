import { Component, OnChanges, SimpleChanges } from '@angular/core';
import { AuthService } from '../../servises/auth.service';
import { FormBuilder, FormGroup, NgModel, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';
import { NgIf } from '@angular/common';
@Component({
  selector: 'app-signin',
  standalone: true,
  imports: [NgIf, ReactiveFormsModule],
  templateUrl: './signin.component.html',
  styleUrl: './signin.component.css',
})
export class SigninComponent {
  loginForm: FormGroup;
  errorMessage: string = '';
  constructor(
    private authServise: AuthService,
    private fb: FormBuilder,
    private router: Router
  ) {
    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required]],
    });
  }

  login() {
    if (this.loginForm.valid) {
      const dataLogin = this.loginForm.value;
      this.authServise.login(dataLogin).subscribe({
        next: (response) => {
          // Assuming the token is returned
          localStorage.setItem('token', response.token);
          this.router.navigate(['home']); // Navigate to a different route upon success

          console.log(response);
        },
        error: (err) => {
          // Handle errors (invalid credentials, server issues, etc.)
          this.errorMessage = 'Invalid email or password.';
        },
      });
    }
  }
}
