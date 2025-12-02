import swanSpaceLogo from 'figma:asset/5c0dde3b923e87af7ba9ec909fd5edf4d6bec6ed.png';
import { Sparkles } from 'lucide-react';

export function SpaceSwan() {
  return (
    <div className="relative w-full h-full flex items-center justify-center">
      {/* Floating stars and cosmic elements */}
      <div className="absolute inset-0 overflow-hidden">
        {/* Stars */}
        {[...Array(20)].map((_, i) => (
          <div
            key={`star-${i}`}
            className="absolute w-1 h-1 bg-white rounded-full animate-pulse"
            style={{
              top: `${Math.random() * 100}%`,
              left: `${Math.random() * 100}%`,
              animationDelay: `${Math.random() * 3}s`,
              animationDuration: `${2 + Math.random() * 2}s`,
              opacity: Math.random() * 0.8 + 0.2,
            }}
          />
        ))}
        
        {/* Sparkles */}
        <Sparkles 
          className="absolute top-[15%] right-[20%] text-cyan-400 opacity-70 animate-pulse" 
          size={16}
          style={{ animationDelay: '0.5s' }}
        />
        <Sparkles 
          className="absolute bottom-[25%] left-[15%] text-pink-400 opacity-60 animate-pulse" 
          size={12}
          style={{ animationDelay: '1s' }}
        />
        <Sparkles 
          className="absolute top-[40%] left-[25%] text-purple-400 opacity-70 animate-pulse" 
          size={14}
          style={{ animationDelay: '1.5s' }}
        />
        
        {/* Small planets/orbs */}
        <div 
          className="absolute top-[20%] left-[10%] w-8 h-8 rounded-full bg-gradient-to-br from-purple-500/30 to-pink-500/30 blur-sm"
          style={{ animation: 'float 8s ease-in-out infinite' }}
        />
        <div 
          className="absolute bottom-[30%] right-[15%] w-6 h-6 rounded-full bg-gradient-to-br from-cyan-500/30 to-blue-500/30 blur-sm"
          style={{ animation: 'float 10s ease-in-out infinite reverse' }}
        />
        <div 
          className="absolute top-[60%] right-[25%] w-10 h-10 rounded-full bg-gradient-to-br from-fuchsia-500/20 to-purple-500/20 blur-md"
          style={{ animation: 'float 12s ease-in-out infinite', animationDelay: '2s' }}
        />
        
        {/* Cosmic dust/nebula effect */}
        <div 
          className="absolute top-[10%] right-[10%] w-32 h-32 rounded-full bg-purple-500/10 blur-2xl"
          style={{ animation: 'float 15s ease-in-out infinite' }}
        />
        <div 
          className="absolute bottom-[10%] left-[10%] w-40 h-40 rounded-full bg-pink-500/10 blur-3xl"
          style={{ animation: 'float 18s ease-in-out infinite reverse' }}
        />
      </div>
      
      {/* Main Swan - Floating through space */}
      <div 
        className="relative z-10 transform scale-110"
        style={{ animation: 'float 6s ease-in-out infinite' }}
      >
        {/* Glow aura around swan */}
        <div className="absolute -inset-8 blur-3xl opacity-40">
          <div className="w-full h-full bg-gradient-to-br from-fuchsia-500 via-purple-500 to-cyan-500 rounded-full"></div>
        </div>
        
        {/* Swan logo - only the swan part */}
        <div className="relative w-40 h-40 flex items-center justify-center">
          {/* Main logo with white swan and magenta accents */}
          <img 
            src={swanSpaceLogo} 
            alt="Space Swan" 
            className="w-32 h-32 object-contain"
            style={{
              filter: 'hue-rotate(280deg) saturate(1.4) brightness(1.3) drop-shadow(0 0 20px rgba(217, 70, 239, 0.8)) drop-shadow(0 0 40px rgba(139, 92, 246, 0.6))',
            }}
          />
          
          {/* Animated ring effect */}
          <div className="absolute inset-0 rounded-full border-2 border-fuchsia-500/30 animate-ping" style={{ animationDuration: '3s' }}></div>
          <div className="absolute inset-0 scale-110 rounded-full border border-purple-500/20 animate-pulse"></div>
        </div>
        
        {/* Trailing comet effect */}
        <div className="absolute -bottom-8 left-1/2 -translate-x-1/2 w-1 h-16 bg-gradient-to-b from-fuchsia-500 via-purple-500 to-transparent opacity-50 blur-sm"></div>
        
        {/* Sparkle trail */}
        <div className="absolute top-1/2 -left-8 w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style={{ animationDelay: '0.3s' }}></div>
        <div className="absolute top-1/3 -right-6 w-1.5 h-1.5 bg-pink-400 rounded-full animate-pulse" style={{ animationDelay: '0.6s' }}></div>
        <div className="absolute bottom-1/3 -left-4 w-1 h-1 bg-purple-400 rounded-full animate-pulse" style={{ animationDelay: '0.9s' }}></div>
      </div>
      
      {/* Foreground stars (closer to viewer) */}
      {[...Array(8)].map((_, i) => (
        <div
          key={`fg-star-${i}`}
          className="absolute w-2 h-2 bg-white rounded-full animate-pulse z-20"
          style={{
            top: `${Math.random() * 100}%`,
            left: `${Math.random() * 100}%`,
            animationDelay: `${Math.random() * 2}s`,
            animationDuration: `${1.5 + Math.random() * 1.5}s`,
            opacity: Math.random() * 0.9 + 0.1,
            boxShadow: '0 0 4px rgba(255, 255, 255, 0.8)',
          }}
        />
      ))}
    </div>
  );
}
