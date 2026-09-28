import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaymentAdsComponent } from './payment-ads.component';

describe('PaymentAdsComponent', () => {
  let component: PaymentAdsComponent;
  let fixture: ComponentFixture<PaymentAdsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PaymentAdsComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(PaymentAdsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
