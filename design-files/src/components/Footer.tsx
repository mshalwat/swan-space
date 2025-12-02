import { Mail, Phone, MapPin, Linkedin, Twitter, Facebook } from 'lucide-react';
import { Logo } from './Logo';
import { useLanguage } from '../lib/LanguageContext';

export function Footer() {
  const { t } = useLanguage();
  const currentYear = new Date().getFullYear();
  
  return (
    <footer className="relative border-t border-purple-500/20 bg-[#0a0e27]/90 backdrop-blur-xl">
      <div className="container-custom py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Brand */}
          <div>
            <div className="mb-4">
              <Logo size="sm" showText={true} />
            </div>
            <p className="text-gray-400 mb-6">
              {t.footer.tagline}
            </p>
            <div className="flex gap-4">
              <a 
                href="#" 
                className="w-10 h-10 rounded-lg glass-card border border-purple-500/30 hover:border-purple-500 flex items-center justify-center text-gray-400 hover:text-purple-400 transition-all"
              >
                <Linkedin className="w-5 h-5" />
              </a>
              <a 
                href="#" 
                className="w-10 h-10 rounded-lg glass-card border border-purple-500/30 hover:border-purple-500 flex items-center justify-center text-gray-400 hover:text-purple-400 transition-all"
              >
                <Twitter className="w-5 h-5" />
              </a>
              <a 
                href="#" 
                className="w-10 h-10 rounded-lg glass-card border border-purple-500/30 hover:border-purple-500 flex items-center justify-center text-gray-400 hover:text-purple-400 transition-all"
              >
                <Facebook className="w-5 h-5" />
              </a>
            </div>
          </div>
          
          {/* Quick Links */}
          <div>
            <h6 className="mb-4 text-white">{t.footer.quickLinks}</h6>
            <ul className="space-y-3">
              <li>
                <a href="#home" className="text-gray-400 hover:text-purple-400 transition-colors">
                  {t.nav.home}
                </a>
              </li>
              <li>
                <a href="#services" className="text-gray-400 hover:text-purple-400 transition-colors">
                  {t.nav.services}
                </a>
              </li>
              <li>
                <a href="#about" className="text-gray-400 hover:text-purple-400 transition-colors">
                  {t.nav.about}
                </a>
              </li>
              <li>
                <a href="#case-studies" className="text-gray-400 hover:text-purple-400 transition-colors">
                  {t.nav.caseStudies}
                </a>
              </li>
            </ul>
          </div>
          
          {/* Services */}
          <div>
            <h6 className="mb-4 text-white">{t.footer.services}</h6>
            <ul className="space-y-3">
              {t.services.items.slice(0, 4).map((service, index) => (
                <li key={index} className="text-gray-400 text-sm">{service.title}</li>
              ))}
            </ul>
          </div>
          
          {/* Contact */}
          <div>
            <h6 className="mb-4 text-white">{t.footer.contact}</h6>
            <ul className="space-y-3">
              <li className="flex items-start gap-3 text-gray-400 text-sm">
                <Mail className="w-4 h-4 mt-0.5 flex-shrink-0 text-purple-400" />
                <span>hello@swanspace.com</span>
              </li>
              <li className="flex items-start gap-3 text-gray-400 text-sm">
                <Phone className="w-4 h-4 mt-0.5 flex-shrink-0 text-purple-400" />
                <span>+1 (555) 123-4567</span>
              </li>
              <li className="flex items-start gap-3 text-gray-400 text-sm">
                <MapPin className="w-4 h-4 mt-0.5 flex-shrink-0 text-purple-400" />
                <span>123 Education Street, Tech City, TC 12345</span>
              </li>
            </ul>
          </div>
        </div>
        
        {/* Bottom Bar */}
        <div className="border-t border-purple-500/20 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
          <p className="text-gray-400 text-sm text-center">
            &copy; {currentYear} {t.footer.copyright}
          </p>
          <div className="flex gap-6 text-sm">
            <a href="#" className="text-gray-400 hover:text-purple-400 transition-colors">
              {t.footer.privacy}
            </a>
            <a href="#" className="text-gray-400 hover:text-purple-400 transition-colors">
              {t.footer.terms}
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}