import { ArrowRight, Play, Sparkles } from 'lucide-react';
import { useLanguage } from '../../lib/LanguageContext';
import { SpaceSwan } from '../SpaceSwan';

export function HeroSection() {
  const { t } = useLanguage();
  
  return (
    <section id="home" className="relative min-h-screen flex items-center overflow-hidden pt-20">
      {/* 3D Floating Elements */}
      <div className="absolute top-1/4 right-1/4 w-64 h-64 bg-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
      <div className="absolute bottom-1/4 left-1/4 w-96 h-96 bg-pink-600/20 rounded-full blur-3xl animate-pulse" style={{ animationDelay: '1s' }}></div>
      
      <div className="container-custom relative z-10 py-20">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          {/* Left Content */}
          <div className="space-y-8">
            <div className="inline-flex items-center gap-2 px-4 py-2 bg-[#1a1f3a]/60 backdrop-blur-md rounded-full border border-purple-500/30 glow-effect">
              <Sparkles className="w-4 h-4 text-cyan-400" />
              <span className="text-sm text-gray-300">
                {t.hero.badge}
              </span>
            </div>

            <div className="space-y-4">
              <h1 className="text-5xl lg:text-7xl">
                {t.hero.title}{' '}
                <span className="text-gradient-nebula animate-pulse">
                  {t.hero.titleHighlight}
                </span>
              </h1>
            </div>

            <p className="text-xl text-gray-300 leading-relaxed">
              {t.hero.description}
            </p>

            <div className="flex flex-col sm:flex-row gap-4">
              <a
                href="#contact"
                className="group relative overflow-hidden px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-2xl hover:shadow-purple-500/50 hover:scale-105"
              >
                <span className="relative z-10">{t.hero.getStarted}</span>
                <ArrowRight className="relative z-10 w-5 h-5 group-hover:translate-x-1 transition-transform" />
                <div className="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              </a>
              
              <a
                href="#case-studies"
                className="group px-8 py-4 bg-[#1a1f3a]/60 backdrop-blur-md text-white rounded-full border border-purple-500/30 hover:border-purple-500 transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-lg hover:shadow-purple-500/30"
              >
                <Play className="w-5 h-5" />
                {t.hero.seeWork}
              </a>
            </div>

            {/* Stats */}
            <div className="flex flex-wrap gap-8 pt-8">
              <div className="group">
                <div className="text-4xl font-bold text-gradient-cosmic mb-1">50+</div>
                <div className="text-gray-400 group-hover:text-gray-300 transition-colors">
                  {t.hero.stats.schools}
                </div>
              </div>
              <div className="group">
                <div className="text-4xl font-bold text-gradient-cosmic mb-1">98%</div>
                <div className="text-gray-400 group-hover:text-gray-300 transition-colors">
                  {t.hero.stats.satisfaction}
                </div>
              </div>
              <div className="group">
                <div className="text-4xl font-bold text-gradient-cosmic mb-1">5+</div>
                <div className="text-gray-400 group-hover:text-gray-300 transition-colors">
                  {t.hero.stats.experience}
                </div>
              </div>
            </div>
          </div>

          {/* Right Content - 3D Illustration with Space Swan */}
          <div className="relative hidden lg:block">
            <div className="relative perspective-1000">
              {/* 3D Card Stack */}
              <div className="relative w-full h-[600px]">
                {/* Back Card */}
                <div
                  className="absolute inset-0 glass-card rounded-3xl transform rotate-6 scale-95 opacity-50"
                  style={{ transformStyle: 'preserve-3d' }}
                ></div>
                
                {/* Middle Card */}
                <div
                  className="absolute inset-0 glass-card rounded-3xl transform rotate-3 scale-97 opacity-75"
                  style={{ transformStyle: 'preserve-3d' }}
                ></div>
                
                {/* Front Card with Space Swan */}
                <div className="absolute inset-0 glass-card-dark rounded-3xl p-8 glow-effect transform hover:scale-105 transition-all duration-500 overflow-hidden">
                  {/* Gradient background for the card */}
                  <div className="absolute inset-0 bg-gradient-to-br from-[#E94D9C]/20 via-[#8B5CF6]/20 to-[#6366F1]/20 rounded-3xl"></div>
                  
                  <div className="relative h-full flex flex-col items-center justify-center space-y-8 z-10">
                    {/* Space Swan replacing rocket */}
                    <div className="relative w-full h-64">
                      <SpaceSwan />
                    </div>
                    
                    <div className="text-center space-y-4">
                      <h3 className="text-2xl text-gradient-nebula">
                        Modern School Platform
                      </h3>
                      <p className="text-gray-400">
                        Powered by cutting-edge technology
                      </p>
                    </div>
                    
                    {/* Floating Tech Icons */}
                    <div className="flex gap-4">
                      {['⚡', '🎨', '🔒', '📱'].map((icon, i) => (
                        <div
                          key={i}
                          className="w-12 h-12 rounded-xl bg-[#1a1f3a]/80 backdrop-blur-sm border border-purple-500/30 flex items-center justify-center text-2xl hover:scale-110 transition-transform cursor-pointer"
                          style={{ animation: `float ${3 + i}s ease-in-out infinite` }}
                        >
                          {icon}
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}