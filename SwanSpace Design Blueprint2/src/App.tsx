import { LanguageProvider } from './lib/LanguageContext';
import { Navbar } from './components/Navbar';
import { Footer } from './components/Footer';
import { SpaceBackground } from './components/SpaceBackground';
import { HeroSection } from './components/sections/HeroSection';
import { AboutIntro } from './components/sections/AboutIntro';
import { ServicesOverview } from './components/sections/ServicesOverview';
import { Testimonials } from './components/sections/Testimonials';
import { ContactSection } from './components/sections/ContactSection';

export default function App() {
  return (
    <LanguageProvider>
      <div className="min-h-screen relative">
        <SpaceBackground />
        
        <div className="relative z-10">
          <Navbar />
          
          {/* Main Content */}
          <main>
            <HeroSection />
            <AboutIntro />
            <ServicesOverview />
            <Testimonials />
            <ContactSection />
          </main>
          
          <Footer />
        </div>
      </div>
    </LanguageProvider>
  );
}
