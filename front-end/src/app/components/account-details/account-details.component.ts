import { Component } from '@angular/core';
import { CampgianService } from '../../servises/campgian.service';
import { NgIf } from '@angular/common';
import { AccountService } from '../../servises/account.service';
import { RouterLink, ActivatedRoute } from '@angular/router';
import { ChangeDetectionStrategy } from '@angular/core';
import { MatExpansionModule } from '@angular/material/expansion';
import { CommonModule } from '@angular/common';
import { NgModel } from '@angular/forms';

@Component({
  selector: 'app-account-details',
  standalone: true,
  imports: [NgIf, MatExpansionModule, CommonModule],
  templateUrl: './account-details.component.html',
  styleUrl: './account-details.component.css',
})
export class AccountDetailsComponent {
  accounts: any[] = []; // Array to hold campaign data
  accountId :any = null;
  constructor(
    private compgianService: CampgianService,
    private accountSeirvce: AccountService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.paramMap.subscribe((params) => {
      this.accountId = params.get('id');
      console.log('account ID:', this.accountId);

      this.getAcountWithCampgians(this.accountId);
    });
  }


  getAcountWithCampgians(id: string) {
    this.accountSeirvce.getAcountWithCampgians(id).subscribe(
      (response) => {
        this.accounts = response.data.data;
        console.log(this.accounts);
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
// .data.data.campgians
